<div class="row">
    <?php
    /* @var $this SlideshowController */
    /* @var $model Slideshow */

    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => '<i class="fa fa-home"></i> Trang chủ', 'url' => array('site/index')),
            array('name' => 'Cập nhật Slide',),
        ),
    ));
    ?>   
</div>

<div class="row">
    <div class="col-lg-12">
        <h6 class="text-info lable-admin">Cập nhật Slide</h6>  
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="">
            <?php $this->renderPartial('_form', array('model' => $model)); ?>
        </div>
    </div>
</div>