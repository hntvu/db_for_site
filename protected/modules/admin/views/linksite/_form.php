<?php
/* @var $this LinksiteController */
/* @var $model Linksite */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'linksite-form',
        'htmlOptions' => array(
            'class' => 'form-horizontal',
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

    <?php if (Yii::app()->user->hasFlash('createLink')) : ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <?php if (Yii::app()->user->hasFlash('createLink')) echo Yii::app()->user->getFlash('createLink'); ?>
        </div>
    <?php elseif (Yii::app()->user->hasFlash('updateCate')): ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <?php if (Yii::app()->user->hasFlash('updateCate')) echo Yii::app()->user->getFlash('updateCate'); ?>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <div class="col-sm-4">
            <div class="col-sm-12">
                <?php echo $form->labelEx($model, 'title', array('class' => 'control-label pull-left')); ?>
            </div>
            <div class="col-sm-12">
                <?php echo $form->error($model, 'title'); ?>
                <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 128, 'class' => 'form-control', 'placeholder' => 'Ví dụ: Trung tâm tin học Sa Đéc')); ?>
            </div> 
        </div>
        <div class="col-sm-4">
            <div class="col-sm-12">
                <?php echo $form->labelEx($model, 'link', array('class' => 'control-label pull-left')); ?>
            </div>
            <div class="col-sm-12">
                <?php echo $form->error($model, 'link'); ?>
                <?php echo $form->textField($model, 'link', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Ví dụ: ttth.sadec.dongthap.gov.vn')); ?>
            </div> 
        </div>
        <div class="col-sm-4">
            <div class="col-sm-12">
                <?php echo $form->labelEx($model, 'opgroup', array('class' => 'control-label pull-left')); ?>
            </div>
            <div class="col-sm-12">
                <?php echo $form->error($model, 'opgroup'); ?>
                <?php echo $form->textField($model, 'opgroup', array('size' => 60, 'maxlength' => 128, 'class' => 'form-control', 'placeholder' => 'Ví dụ: Trang thông tin')); ?>
            </div> 
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12 text-center">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo' : 'Save', array('class' => 'btn btn-primary btn-xs')); ?>
            <?php echo CHtml::resetButton('Reset', array('class' => 'btn btn-danger btn-xs')); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->