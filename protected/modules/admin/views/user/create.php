<div class="row">
    <?php
    /* @var $this UserController */
    /* @var $model User */
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => '<i class="fa fa-home"></i> Trang chủ', 'url' => array('site/index')),
            array('name' => 'Tạo thành viên',),
        ),
    ));
    ?>   
</div>

<div class="row">
    <div class="col-lg-12">
        <h6 class="text-info lable-admin">TẠO THÀNH VIÊN</h6>  
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="">
            <?php $this->renderPartial('_form', array('model' => $model)); ?>
        </div>
    </div>
</div>