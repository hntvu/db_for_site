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
        <?php Yii::app()->bootstrap->registerBxSlider(); ?>
        <?php Yii::app()->bootstrap->registerMainCss(); ?>

        <?php Yii::app()->bootstrap->registerJS(); ?>
        <?php Yii::app()->bootstrap->registerJSBxSlider(); ?>
        <?php Yii::app()->bootstrap->registerJSMain(); ?>

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/uploads/files/favicon/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container">
            <!--TOP HEAD-->
            <div class="row">
                <div class="col-lg-12">

                </div>
            </div>

            <!--MENU-->
            <div class="row">
                <nav id='cssmenu' class="navbar-static-top">
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'items' => Yii::app()->menuCates->getMenuTree(),
                        'encodeLabel' => false,
                        'htmlOptions' => array('class' => 'nav navbar-nav',),
                            //'submenuHtmlOptions' => array('class' => 'dropdown-menu',)
                    ));
                    ?>
                    <li class="pull-right">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'search-form',
                                'action' => $this->createUrl('site/search'),
                                'htmlOptions' => array(
                                    'class' => 'navbar-form form-search',
                                ),
                            ));
                            ?>
                            <div class="input-group">
                                <?= $form->textField($this->search, 'title', array('class' => 'form-control', 'placeholder' => 'Tìm kiếm...')) ?>
                                <div class="input-group-btn">
                                    <button class="btn btn-warning" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                            <?php $this->endWidget(); ?>
                        </div>
                    </li>
                </nav>
                <script>
                    $('#cssmenu ul.nav').prepend('<li><a href="<?= Yii::app()->baseUrl ?>/"><i class="fa fa-home"></i> Trang chủ</a></li>');
                </script>
            </div>
            <!--SLIDE SHOW-->
            <div class="row">
                <?php $this->widget('SlideshowWidget'); ?>
            </div>

            <div class="row">
                <?php echo $content; ?>
            </div>

            <!--_____________________ BEGIN MAIN FOOTER _____________________-->
            <div class="row">
                <footer>
                    <div class="footer-top col-lg-12 col-sm-12">
                        <div class="col-lg-6 col-sm-6">
                            <h4><a>Thông tin</a></h4>
                            <address>
                                <strong class="text-uppercase" style="font-size: 1.3em">Trung tâm tin học thành phố Sa Đéc</strong><br>
                                <i class="fa fa-map-marker"></i>  Số 530A, Nguyễn Sinh Sắc,Khóm 5, Phường 1, Thành Phố Sa Đéc, Đồng Tháp.<br>
                                <i class="fa fa-phone"></i> (0673) 861 534 - <i class="fa fa-fax"></i> (0673) 861 534
                            </address>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <h4><a>Liên kết Website</a></h4>
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'formLink',
                                //'action' => Yii::app()->createUrl($this->route),
                                //'method' => 'GET',
                                'htmlOptions' => array(
                                    'class' => 'form-horizontal',
                                ),
                            ));
                            ?>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <?=
                                    $form->dropDownlist($this->link, 'linksite', Linksite::model()->getLinkSite(), array(
                                        'empty' => 'Chọn liên kết site',
                                        'class' => 'form-control'
                                    ))
                                    ?>
                                </div>
                            </div>
                            <?php $this->endWidget(); ?>
                            <script>
                                $('#Linksite_linksite').change(function () {
                                    var link = $('#Linksite_linksite option:selected').val();
                                    if (link != "") {
                                        window.open('http://' + link, '_blank');
                                    } else {
                                        alert('TRUNG TÂM TIN HỌC THÀNH PHỐ SA ĐÉC\nSố 530A, Nguyễn Sinh Sắc,Khóm 5, Phường 1, Thành Phố Sa Đéc, Đồng Tháp\nĐiện thoại: (0673) 861 534\nFax: (0673) 861 534')
                                    }

                                });

                            </script>
                            <style>
                                #Linksite_linksite optgroup{
                                    padding-left: 15px;
                                    color: #FF6600;
                                }
                                #Linksite_linksite option:first-child{
                                    padding-left: 15px;
                                    color: #055AA8;
                                    font-style: italic;

                                }
                                #Linksite_linksite optgroup option{
                                    padding-left: 15px;
                                    color: #055AA8;
                                    font-style: italic;

                                }
                            </style>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                            <h4><a>Lượt truy cập</a></h4>
                            <ul>
                                <li><a>Lượt truy cập: <?php echo Yii::app()->userCounter->getTotal(); ?> lượt</a></li>
                                <li><a>Online: <?php echo Yii::app()->userCounter->getOnline(); ?> <i class="fa fa-user"></i></a></li>
                                <li><a>Hôm nay: <?php echo Yii::app()->userCounter->getToday(); ?> lượt</a></li>
                                <li><a>Hôm qua: <?php echo Yii::app()->userCounter->getYesterday(); ?> lượt</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-bottom col-lg-12 col-sm-12">
                        <p class="text-center">bản quyền website thuộc về trung tâm tin học sa đéc</p>
                    </div>
                </footer>
            </div>

        </div><!-- page -->

    </body>
</html>
