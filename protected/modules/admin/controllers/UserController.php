<?php

class UserController extends RController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/admin-layout';

    public function filters() {
        return array(
            'rights',
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        Yii::app()->bootstrap->registerJS();
        Yii::app()->bootstrap->registerJSBackend();
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        Yii::app()->bootstrap->registerJS();
        Yii::app()->bootstrap->registerJSBackend();
        $model = new User;
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            //Upload avatar
            $avatarImg = CUploadedFile::getInstance($model, 'avatar');
            if ($avatarImg != NULL) {
                $fileArray = array("image/jpeg", "image/gif", "image/png", "image/bmp");
                $checkFile = in_array($avatarImg->type, $fileArray);
                if ($checkFile) {
                    if ($avatarImg->size < 50000) {
                        $avatarImg->saveAs(Yii::app()->basePath . '/../uploads/files/avatar/' . $avatarImg->name);
                        $model->avatar = $avatarImg->name; //save file name
                    }
                }
            }
            $model->password = $model->hashPassword($_POST['User']['password']);
            $model->datecreate = date_create()->format('Y-m-d H:i:s');
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
            else
                $model->password = $_POST['User']['password'];
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        Yii::app()->bootstrap->registerJS();
        Yii::app()->bootstrap->registerJSBackend();
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            //Upload file image
            $avatarImg = CUploadedFile::getInstance($model, 'avatar');
            if ($avatarImg != NULL) {
                $fileArray = array("image/jpeg", "image/gif", "image/png", "image/bmp");
                $checkFile = in_array($avatarImg->type, $fileArray);
                if ($checkFile) {
                    if ($avatarImg->size < 50000) {
                        $avatarImg->saveAs(Yii::app()->basePath . '/../uploads/files/avatar/' . $avatarImg->name);
                        $model->avatar = $avatarImg->name; //save file name
                    } else {
                        $model->avatar = $this->loadModel($id)->avatar;
                    }
                } else {
                    $model->avatar = $this->loadModel($id)->avatar;
                }
            } else {
                $model->avatar = $this->loadModel($id)->avatar;
            }
            $model->lastupdate = date_create()->format('Y-m-d H:i:s');

            //Cap nhat mat khau
            $new_password = $_POST['new_pass'];
            $confirm_password = $_POST['confirm_pass'];
            if ($new_password != '' && $confirm_password != '') {
                if ($new_password == $confirm_password) {
                    $model->password = $model->hashPassword($_POST['new_pass']);
                    if ($model->save(FALSE)) {
                        Yii::app()->user->setFlash('changePass', 'Đổi mật khẩu thành công');
                        $this->refresh();
                    }
                } else {
                    Yii::app()->user->setFlash('error', 'Mật khẩu không khớp vui lòng nhập lại');
                    $this->refresh();
                }
            } else {
                if ($model->save(FALSE))
                    Yii::app()->user->setFlash('updateProfile', 'Cập nhật thành công');
                $this->refresh();
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        Yii::app()->bootstrap->registerJSBackend();
        Yii::app()->bootstrap->registerJS();
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return User the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
