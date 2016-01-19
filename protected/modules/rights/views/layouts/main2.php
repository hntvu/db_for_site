<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <meta name="description" content="Trung tam tin hoc sa dec"/>
        <meta name="keywords" content="itsadec, itsd, itcsd"/>
        <meta name="language" content="vi">

        <?php Yii::app()->bootstrap->registerBootstrapMin(); ?>
        <?php Yii::app()->bootstrap->registerFontAwesome(); ?>
        <?php Yii::app()->bootstrap->registerBackend(); ?>
        <?php Yii::app()->bootstrap->registerJSBackend(); ?>
        <?php Yii::app()->bootstrap->registerJSBootstrap(); ?>


        <link href="<?php echo Yii::app()->request->baseUrl; ?>/uploads/files/favicon/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <div class="side-menu">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <div class="brand-wrapper">
                        <button type="button" class="navbar-toggle">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="brand-name-wrapper">
                            <a class="navbar-brand" href="<?= Yii::app()->baseUrl ?>/admin/site/index">
                                ITC SaDec
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Main Menu -->
                <div class="side-menu-container">
                    <div class="nav navbar-nav" id="accordian">
                        <?php $this->widget('UserMenu'); ?>
                    </div>
                </div>
            </nav>

        </div>
        <div class="container-fluid">
            <div class="side-body">
                <div class="row">
                    <nav class="navbar navbar-inverse navbar-static-top col-lg-12" role="navigation">
                        <div class="navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Xin chào: admin <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= Yii::app()->baseUrl ?>/"><i class="fa fa-internet-explorer"></i> Website</a></li>
                                        <li><a href="<?= Yii::app()->baseUrl ?>/admin/user/view/id/<?= Yii::app()->user->id ?>"><i class="fa fa-file-text"></i> Thông tin</a></li>
                                        <li class="divider"></li>
                                        <li><?= CHtml::link('<i class="fa fa-sign-out"></i> Thoát', '#', array('submit' => array('/admin/site/logout'), 'confirm' => 'Bạn muốn thoát?')); ?></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php if ($this->id !== 'install'): ?>
                            <div id="menu">
                                <?php $this->renderPartial('/_menu'); ?>
                            </div>
                        <?php endif; ?>
                        <?php $this->renderPartial('/_flash'); ?>

                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
