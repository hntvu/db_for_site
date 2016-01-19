<?php

class SlideshowController extends RController {

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
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        Yii::app()->bootstrap->registerJS();
        Yii::app()->bootstrap->registerJSBackend();
        $model = new Slideshow;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Slideshow'])) {
            $model->attributes = $_POST['Slideshow'];
            $imageArray = explode('/', $model->image);
            $getInstall = end($imageArray);
            $model->image = $getInstall;
            $model->datecreate = date_create()->format('Y-m-d H:i:s');
            $model->usercreate = Yii::app()->user->id;
            if ($model->save())
                Yii::app()->user->setFlash('createSlide', 'Tạo Slideshow thành công');
            $this->refresh();
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

        if (isset($_POST['Slideshow'])) {
            $model->attributes = $_POST['Slideshow'];
            $imageArray = explode('/', $model->image);
            $getInstall = end($imageArray);
            $model->image = $getInstall;
            $model->lastupdate = date_create()->format('Y-m-d H:i:s');
            if ($model->save())
                Yii::app()->user->setFlash('updateSlide', 'Cập nhật Slideshow thành công');
            $this->refresh();
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
     * Lists all models.
     */
    public function actionIndex() {
        Yii::app()->bootstrap->registerJS();
        Yii::app()->bootstrap->registerJSBackend();
        $model = new Slideshow('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Slideshow']))
            $model->attributes = $_GET['Slideshow'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        Yii::app()->bootstrap->registerJS();
        Yii::app()->bootstrap->registerJSBackend();
        $model = new Slideshow('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Slideshow']))
            $model->attributes = $_GET['Slideshow'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Slideshow the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Slideshow::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Slideshow $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'slideshow-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
