<?php

class SiteController extends Controller {

    public function actions() {
        return array(
            'captcha' => array(
                'class' => 'CaptchaExtendedAction',
            ),
        );
    }

    public function actionIndex() {
        //lay 1 tin moi de hien thi phan tin tuc
        $headTab = new Menu();
        $numHeadTab1 = $headTab->model()->find('alias="tin-dia-phuong"')->id;
        $cdbNewsLocal = new CDbCriteria();
        $cdbNewsLocal->order = 'datecreate DESC';
        $cdbNewsLocal->limit = 1;
        $cdbNewsLocal->condition = ('idmenu =' . $numHeadTab1);
        $modelNewsLocal = News::model()->find($cdbNewsLocal);
        if ($modelNewsLocal === NULL) {
            Yii::app()->user->setFlash('LocalEmpty', 'Dữ liệu đang cập nhật');
            $modelLocalMore = Yii::app()->user->setFlash('LocalEmptyMore', 'Dữ liệu đang cập nhật');
        } else {
            //lay 4 tin khac de hien thi phan tin tuc
            $cdbLocalMore = new CDbCriteria();
            $cdbLocalMore->limit = 4;
            $cdbLocalMore->order = 'datecreate DESC';
            $cdbLocalMore->condition = ('id NOT IN ("' . $modelNewsLocal->id . '") AND idmenu=' . $modelNewsLocal->idmenu);
            $modelLocalMore = News::model()->findAll($cdbLocalMore);
        }



        //lay 1 tin moi de hien thi phan Tin cong nghe
        $numHeadTab2 = $headTab->model()->find('alias="tin-cong-nghe"')->id;
        $cdbNewsTech = new CDbCriteria();
        $cdbNewsTech->order = 'datecreate DESC';
        $cdbNewsTech->limit = 1;
        $cdbNewsTech->condition = ('idmenu =' . $numHeadTab2);
        $modelNewsTech = News::model()->find($cdbNewsTech);
        if ($modelNewsTech === NULL) {
            Yii::app()->user->setFlash('emptyData', 'Dữ liệu đang cập nhật');
            $modelTechMore = Yii::app()->user->setFlash('emptyDataMore', 'Dữ liệu đang cập nhật');
        } else {
            //lay 2 tin khac de hien thi phan Tin cong nghe
            $cdbTechMore = new CDbCriteria();
            $cdbTechMore->limit = 2;
            $cdbTechMore->order = 'datecreate DESC';
            $cdbTechMore->condition = ('id NOT IN ("' . $modelNewsTech->id . '") AND idmenu=' . $modelNewsTech->idmenu);
            $modelTechMore = News::model()->findAll($cdbTechMore);
        }


        //lay 1 tin moi de hien thi phan Thong bao
        $numHeadTab3 = $headTab->model()->find('alias="thong-bao"')->id;
        $cdbNewsNotify = new CDbCriteria();
        $cdbNewsNotify->order = 'datecreate DESC';
        $cdbNewsNotify->limit = 1;
        $cdbNewsNotify->condition = ('idmenu =' . $numHeadTab3);
        $modelNewsNotify = News::model()->find($cdbNewsNotify);
        if ($modelNewsNotify === NULL) {
            Yii::app()->user->setFlash('NofifyEmpty', 'Dữ liệu đang cập nhật');
            $modelNotifyMore = Yii::app()->user->setFlash('MoreNofifyEmpty', 'Dữ liệu đang cập nhật');
        } else {
            //lay 2 tin khac de hien thi phan Tin cong nghe
            $cdbNotifyMore = new CDbCriteria();
            $cdbNotifyMore->limit = 2;
            $cdbNotifyMore->order = 'datecreate DESC';
            $cdbNotifyMore->condition = ('id NOT IN ("' . $modelNewsNotify->id . '") AND idmenu=' . $modelNewsNotify->idmenu);
            $modelNotifyMore = News::model()->findAll($cdbNotifyMore);
        }

        $this->render('index', array(
            'modelNewsLocal' => $modelNewsLocal,
            'modelLocalMore' => $modelLocalMore,
            'modelNewsTech' => $modelNewsTech,
            'modelTechMore' => $modelTechMore,
            'modelNewsNotify' => $modelNewsNotify,
            'modelNotifyMore' => $modelNotifyMore,
        ));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        $this->layout = '//layouts/error-layout';
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionForget() {
        $this->layout = '//layouts/login-layout';
        $model = new ForgetPasswordForm;
        if (isset($_POST['ForgetPasswordForm'])) {
            $model->attributes = $_POST['ForgetPasswordForm'];
            if ($model->forgetPassword()) {
                Yii::app()->user->setFlash('message', 'Mật khẩu đã được gởi đến Email của bạn!');
                $this->refresh();
            } else {
                Yii::app()->user->setFlash('message_error', 'Email không đúng, vui lòng kiểm tra lại!');
            }
        }
        $this->render('forget', array('model' => $model));
    }

    public function actionSearch() {
        //echo Yii::app()->request->getParam('News_page');exit;
        $this->pageTitle = 'ITC SEARCH';
        $model = new Search();
        if (isset($_POST['Search']))
            Yii::app()->user->setState('search', $_POST['Search']);
        $model->attributes = Yii::app()->user->getState('search');
        $data = $model->searchCates();
        $this->render('search', array(
            'model' => $data,
        ));
    }

}
