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
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/images/files/more/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <style type="text/css">
            body{background: #c0392b;}
            .error {margin: 10% auto; background-color: #ecf0f1;padding: 2% 0;border-radius: 8px;}
            .error-code {bottom: 60%;color: #e74c3c;font-size: 96px;line-height: 100px;}
            .error-desc {font-size: 12px;color: #7f8c8d;}
        </style>
    </head>

    <body>
        <div class="container text-center">
            <div class="error">                
                <?php echo $content; ?>                
            </div>
        </div>
    </body>

</html>
