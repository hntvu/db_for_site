<?php
/* @var $this MenuController */
/* @var $model Menu */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'menu-form',
        'htmlOptions' => array(
            'class' => 'form-horizontal',
            'enctype' => 'multipart/form-data',
        ),
        'enableAjaxValidation' => FALSE,
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>

    <div class="form-group">
        <div class=" col-sm-10">
            <p class="note label label-warning" style="font-size: .9em;">Ghi chú: dấu <span class="required">( * )</span> bắt buộc phải nhập</p>
        </div>
    </div>

    <?php echo $form->errorSummary($model); ?>

    <?php if (Yii::app()->user->hasFlash('createCate')) : ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <?php if (Yii::app()->user->hasFlash('createCate')) echo Yii::app()->user->getFlash('createCate'); ?>
        </div>
    <?php elseif (Yii::app()->user->hasFlash('updateCate')): ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <?php if (Yii::app()->user->hasFlash('updateCate')) echo Yii::app()->user->getFlash('updateCate'); ?>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'parent', array('class' => 'control-label col-lg-2')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'parent', $model->getListParents(), array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'parent'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'title', array('class' => 'control-label col-lg-2')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'title', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control', 'placeholder' => 'Tiêu đề danh mục')); ?>
        </div>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'alias', array('class' => 'control-label col-lg-2')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'alias', array('readonly' => 'readonly', 'size' => 50, 'maxlength' => 50, 'class' => 'form-control', 'placeholder' => 'SEO URL danh mục')); ?>
        </div>
        <?php echo $form->error($model, 'alias'); ?>
    </div>

    <?php
    $this->widget('ext.alias.Alias', array(
        'model' => $model,
    ));
    ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'icon', array('class' => 'control-label col-lg-2')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'icon', array('size' => 30, 'maxlength' => 30, 'class' => 'form-control', 'placeholder' => 'Icon danh mục')); ?>
        </div>
        <?php echo $form->error($model, 'icon'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'status', array('class' => 'control-label col-lg-2')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'status', Yii::app()->params['statusMenu'], array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo danh mục' : 'Save', array('class' => 'btn btn-primary btn-xs')); ?>
            <?php echo CHtml::resetButton('Reset', array('class' => 'btn btn-danger btn-xs')); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->