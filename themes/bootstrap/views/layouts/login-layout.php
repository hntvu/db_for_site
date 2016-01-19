<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="vi-VN">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <meta name="description" content="Trung tam tin hoc sa dec"/>
        <meta name="keywords" content="itsadec, itsd, itcsd"/>

        <?php Yii::app()->bootstrap->registerBootstrapMin(); ?>
        <?php Yii::app()->bootstrap->registerForm(); ?>
        <?php Yii::app()->bootstrap->registerJSLogin(); ?>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/uploads/files/favicon/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container">

            <div class="card card-container">
                <?php echo $content; ?>
            </div>

        </div><!-- page -->

    </body>
</html>
