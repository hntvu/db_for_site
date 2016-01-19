<div class="row">
    <?php
    /* @var $this DocumentController */
    /* @var $model Document */

    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => '<i class="fa fa-home"></i> Trang chủ', 'url' => array('site/index')),
            array('name' => 'Danh sách văn bản', 'url' => array('document/index')),
            array('name' => 'Cập nhật văn bản',),
        ),
    ));
    ?>
</div>


<?php if (isset($model->usercreate) && $model->usercreate == Yii::app()->user->id || Yii::app()->user->getState('roler') == 'admin'): ?>
    <div class="row">
        <div class="col-lg-12">
            <h6 class="text-info lable-admin"><a href="<?= Yii::app()->baseUrl ?>/admin/document/view/id/<?= $model->id ?>">Cập nhật <?= $model->title ?></a></h6> 
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <?php $this->renderPartial('_form', array('model' => $model)); ?>
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