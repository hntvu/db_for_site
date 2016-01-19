<?php

class AdminModule extends CWebModule {

    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            'admin.components.*',
            'admin.models.*',
        ));
        Yii::app()->user->loginUrl = Yii::app()->createUrl('admin/site/login');
        Yii::app()->errorHandler->errorAction = 'admin/site/error';
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action))
            return true;
        else
            return false;
    }

}
