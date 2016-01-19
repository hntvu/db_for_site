<?php

class Bootstrap extends CApplicationComponent {

    /**
     * @var boolean indicates whether assets should be republished on every request.
     */
    public $forceCopyAssets = false;
    protected $_assetsUrl;

    /**
     * Registers the Bootstrap CSS.
     */
    public function registerBootstrapMin() {
        $cs = Yii::app()->getClientScript();
        $cs->registerMetaTag('width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no', 'viewport');
        $filename = 'bootstrap.min.css';
        $cs->registerCssFile($this->getAssetsUrl() . '/css/' . $filename);
    }

    public function registerFontAwesome() {
        $cs = Yii::app()->getClientScript();
        $filename = 'font-awesome.min.css';
        $cs->registerCssFile($this->getAssetsUrl() . '/css/' . $filename);
    }

    public function registerBxSlider() {
        $cs = Yii::app()->getClientScript();
        $filename = 'jquery.bxslider.css';
        $cs->registerCssFile($this->getAssetsUrl() . '/css/' . $filename);
    }

    public function registerMainCss() {
        $cs = Yii::app()->getClientScript();
        $filename = 'style.main.css';
        $cs->registerCssFile($this->getAssetsUrl() . '/css/' . $filename);
    }

    public function registerForm() {
        $cs = Yii::app()->getClientScript();
        $filename = 'form.css';
        $cs->registerCssFile($this->getAssetsUrl() . '/css/' . $filename);
    }

    public function registerBackend() {
        $cs = Yii::app()->getClientScript();
        $filename = 'style.admin.css';
        $cs->registerCssFile($this->getAssetsUrl() . '/css/' . $filename);
    }

    /**
     * Registers the Bootstrap JavaScript.
     */
    public function registerJS($position = CClientScript::POS_HEAD) {
        /** @var CClientScript $cs */
        $cs = Yii::app()->getClientScript();
        $cs->registerCoreScript('jquery');
        $filename = 'bootstrap.min.js';
        $cs->registerScriptFile($this->getAssetsUrl() . '/js/' . $filename, $position);
    }

    public function registerJSBootstrap($position = CClientScript::POS_HEAD) {
        $cs = Yii::app()->getClientScript();
        $filename = 'bootstrap.min.js';
        $cs->registerScriptFile($this->getAssetsUrl() . '/js/' . $filename, $position);
    }

    public function registerJSMain($position = CClientScript::POS_HEAD) {
        $cs = Yii::app()->getClientScript();
        $filename = 'jquery.main.js';
        $cs->registerScriptFile($this->getAssetsUrl() . '/js/' . $filename, $position);
    }

    public function registerJSLogin($position = CClientScript::POS_HEAD) {
        $cs = Yii::app()->getClientScript();
        $filename = 'jquery.login.js';
        $cs->registerScriptFile($this->getAssetsUrl() . '/js/' . $filename, $position);
    }

    public function registerJSBxSlider($position = CClientScript::POS_HEAD) {
        $cs = Yii::app()->getClientScript();
        $filename = 'jquery.bxslider.min.js';
        $cs->registerScriptFile($this->getAssetsUrl() . '/js/' . $filename, $position);
    }
    public function registerJSBackend($position = CClientScript::POS_HEAD) {
        $cs = Yii::app()->getClientScript();
        $filename = 'jquery.admin.js';
        $cs->registerScriptFile($this->getAssetsUrl() . '/js/' . $filename, $position);
    }

    /**
     * Returns the URL to the published assets folder.
     * @return string the URL
     */
    protected function getAssetsUrl() {
        if (isset($this->_assetsUrl))
            return $this->_assetsUrl;
        else {
            $assetsPath = Yii::getPathOfAlias('bootstrap.assets');
            $assetsUrl = Yii::app()->assetManager->publish($assetsPath, true, -1, $this->forceCopyAssets);
            return $this->_assetsUrl = $assetsUrl;
        }
    }

}
