<?php
/* @var $this SlideshowController */
/* @var $model Slideshow */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'slideshow-form',
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

    <?php if (Yii::app()->user->hasFlash('createSlide')) : ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <?php if (Yii::app()->user->hasFlash('createSlide')) echo Yii::app()->user->getFlash('createSlide'); ?>
        </div>
    <?php elseif (Yii::app()->user->hasFlash('updateSlide')): ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <?php if (Yii::app()->user->hasFlash('updateSlide')) echo Yii::app()->user->getFlash('updateSlide'); ?>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <div class="col-sm-6">
            <div class="col-sm-12">
                <?php echo $form->labelEx($model, 'image', array('class' => 'control-label pull-left')); ?>
            </div>
            <div class="col-sm-12">
                <?php echo $form->error($model, 'image'); ?>
                <?php echo $form->textField($model, 'image', array('style' => 'cursor: pointer', 'readonly' => 'readonly', 'onclick' => 'openKCFinder(this)', 'size' => 60, 'maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Click thêm hình Slide...')); ?>
            </div> 
        </div>
        <div class="col-sm-6">
            <div class="col-sm-12">
                <?php echo $form->labelEx($model, 'caption', array('class' => 'control-label pull-left')); ?>
            </div>
            <div class="col-sm-12">
                <?php echo $form->error($model, 'caption'); ?>
                <?php echo $form->textField($model, 'caption', array('size' => 60, 'maxlength' => 128, 'class' => 'form-control', 'placeholder' => 'Mô tả hình Slideshow...')); ?>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function openKCFinder(field) {
            window.KCFinder = {
                callBack: function (url) {
                    field.value = url;
                    window.KCFinder = null;
                }
            };
            window.open('<?php echo Yii::app()->baseUrl ?>/assets/ckeditor/kcfinder/browse.php?type=source&langCode=vi', 'kcfinder_textbox',
                    'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
                    'resizable=1, scrollbars=0, width=800, height=500'
                    );
        }
    </script>

    <div class="form-group">
        <div class="col-sm-12 text-center">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm Slide' : 'Save', array('class' => 'btn btn-primary btn-xs')); ?>
            <?php echo CHtml::resetButton('Reset', array('class' => 'btn btn-danger btn-xs')); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->