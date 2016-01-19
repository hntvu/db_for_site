<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Trung tâm tin học Sa Đéc',
    // preloading 'log' component
    'preload' => array('log', 'userCounter'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.modules.rights.*',
        'application.modules.rights.components.*',
        'ext.yiimail.YiiMailMessage',
        'ext.captchaExtended.CaptchaExtendedValidator',
    ),
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '1',
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
        'rights' => array(
            'cssFile' => FALSE,
            'layout' => 'main2',
        ),
        'admin' => array(
            'defaultController' => 'site',
        ),
    ),
    'language' => 'vi',
    'theme' => 'bootstrap',
    'components' => array(
        'userCounter' => array(
            'class' => 'application.components.UserCounter',
        ),
        'menuCates' => array(
            'class' => 'MenuCates'
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
        ),
        'user' => array(
            'class' => 'RWebUser',
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl' => array('/admin/site/login'),
        ),
        'authManager' => array(
            'class' => 'RDbAuthManager',
            'connectionID' => 'db',
            'itemTable' => 'authitem',
            'itemChildTable' => 'authitemchild',
            'assignmentTable' => 'authassignment',
            'rightsTable' => 'rights',
            'defaultRoles' => array('Guest'),
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'urlSuffix' => '.html',
            'rules' => array(
                'phuc-hoi-mat-khau' => 'site/forget',
                'trang-chu' => 'site/index',
                'admin' => 'admin/site/login',
                'gii' => 'gii/default/login',
                'rights' => 'rights',
                'danh-muc/<controller:[a-z0-9-]+>/<alias:[a-z0-9-]+>' => 'news/index',
                '<alias:[a-z0-9-]+>' => 'news/detail',
                'thong-tin/ket-qua-tim-kiem' => 'site/search',
                'van-ban/noi-dung/<alias:[a-z0-9-]+>' => 'document/index',
                'van-ban/tat-ca' => 'document/index',
                //DEFAULT
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                //ADMIN
                //'admin/<controller:\w+>/<action:\w+>' => 'admin/<controller>/<action>',
                'admin/<controller:\w+>/<action:\w+>/<id:\d+>' => 'admin/<controller>/<action>',
            //'admin/<controller:\w+>/<id:\d+>' => 'admin/<controller>/view',
            ),
        ),
        'db' => require(dirname(__FILE__) . '/database.php'),
        'mail' => array(
            'class' => 'ext.yiimail.YiiMail',
            'transportType' => 'smtp',
            'transportOptions' => array(
                'host' => 'smtp.gmail.com',
                'username' => 'itcsadec@gmail.com',
                'password' => '@12345687',
                'port' => '465',
                'encryption' => 'ssl',
            ),
            'viewPath' => 'application.views.mail',
            'logging' => true,
            'dryRun' => false,
        ),
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
        'cache' => array(
            'class' => 'system.caching.CFileCache',
        ),
    ),
    'params' => require(dirname(__FILE__) . '/params.php'),
);
