<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
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

    <div class="form-group">
        <?php echo $form->labelEx($model, 'hvt', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-2">
            <?php echo $form->telField($model, 'lastname', array('class' => 'form-control', 'size' => 20, 'maxlength' => 20, 'placeholder' => 'Họ của bạn...')); ?>
            <?php echo $form->error($model, 'lastname'); ?>
        </div>
        <div class="col-sm-2">
            <?php echo $form->telField($model, 'firstname', array('class' => 'form-control', 'size' => 20, 'maxlength' => 20, 'placeholder' => 'Tên của bạn...')); ?>
            <?php echo $form->error($model, 'firstname'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'fullname', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-4">
            <?php echo $form->telField($model, 'fullname', array('class' => 'form-control', 'size' => 30, 'maxlength' => 30, 'placeholder' => 'Tên đầy đủ...')); ?>
            <?php echo $form->error($model, 'fullname'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'role', array('class' => 'control-label col-sm-2')); ?>
        <div class="col-sm-4">
            <?php echo $form->dropDownList($model, 'role', $model->getRoles(), array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'role'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'username', array('class' => 'control-label col-sm-2')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'username', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control', 'placeholder' => 'Tên đăng nhập...')); ?>
            <?php echo $form->error($model, 'username'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'password', array('class' => 'control-label col-sm-2')); ?>
        <div class="col-sm-4">
            <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 128, 'class' => 'form-control', 'placeholder' => 'Mật khẩu...')); ?>
            <?php echo $form->error($model, 'password'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'email', array('class' => 'control-label col-sm-2')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'email', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control', 'placeholder' => 'Địa chỉ Email...')); ?>
            <?php echo $form->error($model, 'email'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'avatar', array('class' => 'control-label col-sm-2')); ?>
        <div class="col-sm-4">
            <?php echo $form->fileField($model, 'avatar'); ?>
            <?php echo $form->error($model, 'avatar'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'phone', array('class' => 'control-label col-sm-2')); ?>
        <div class="col-sm-4">
            <?php echo $form->textField($model, 'phone', array('class' => 'form-control', 'placeholder' => 'Số điện thoại...')); ?>
            <?php echo $form->error($model, 'phone'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'note', array('class' => 'control-label col-sm-2')); ?>
        <div class="col-sm-4">
            <?php echo $form->textArea($model, 'note', array('rows' => 6, 'cols' => 50, 'class' => 'form-control', 'placeholder' => 'Thông tin khác...')); ?>
            <?php echo $form->error($model, 'note'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo thành viên' : 'Save', array('class' => 'btn btn-primary btn-xs')); ?>
            <?php echo CHtml::resetButton('Reset', array('class' => 'btn btn-danger btn-xs')); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->