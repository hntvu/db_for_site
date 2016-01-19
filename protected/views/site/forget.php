<h4 class="text-center text-uppercase text-info"><strong>Recover Password</strong></h4><br>
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'webmaster-form',
        'htmlOptions' => array(
            'class' => 'form-horizontal',
        ),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => FALSE,
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>
    <div class="form-group" style="margin-bottom: 0;">
        <div class="col-sm-12">
            <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'size' => 30, 'maxlength' => 30, 'placeholder' => 'Nhập Email khôi phục')); ?>
        </div>
        <div class="col-sm-12">
            <?php echo $form->error($model, 'email'); ?>
        </div>
    </div>
    <?php if (CCaptcha::checkRequirements()): ?>
        <div class="form-group" style="margin-bottom: 0;">
            <div class="col-sm-12">
                <?php $this->widget('CCaptcha'); ?>
                <?php echo $form->textField($model, 'verifyCode', array('class' => 'form-control')); ?>
            </div>
            <div class="col-sm-12">
                <?php echo $form->error($model, 'verifyCode'); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <div class="col-lg-12">
            <div class="alert-success">
                <?php if (Yii::app()->user->hasFlash('message')) echo Yii::app()->user->getFlash('message'); ?>
            </div>
            <div class="alert-danger">
                <?php if (Yii::app()->user->hasFlash('message_error')) echo Yii::app()->user->getFlash('message_error'); ?>
            </div>
            <?= CHtml::submitButton('Send', array('class' => 'btn btn-primary btn-xs', 'style' => 'width:100%; height:30px; margin-top:10px;')) ?>
            <?= CHtml::link('Back Home', '' . Yii::app()->baseUrl . '', array('class' => 'pull-left')) ?>
            <?= CHtml::link('Next Login', '' . Yii::app()->createUrl('admin') . '', array('class' => 'pull-right')) ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->