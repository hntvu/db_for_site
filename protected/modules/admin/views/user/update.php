<div class="row">
    <?php
    /* @var $this UserController */
    /* @var $model User */
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => '<i class="fa fa-home"></i> Trang chủ', 'url' => array('site/index')),
            array('name' => 'Cập nhật thành viên',),
        ),
    ));
    ?>   
</div>



<?php if (isset($model->id) && $model->id == Yii::app()->user->id || Yii::app()->user->getState('roler') == 'admin'): ?>
    <div class="row">
        <div class="col-lg-12">
            <h6 class="text-info lable-admin">cập nhật <?= $model->fullname ?></h6>  
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <?php $this->renderPartial('_formUpdate', array('model' => $model)); ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <?php echo Yii::app()->bootstrap->registerJS(); ?>
    <div class="row">
        <div class="col-lg-12">
            <p class="alert alert-danger">Bạn không được phép thực hiện hành động này</p>
        </div>
    </div>
<?php endif; ?>