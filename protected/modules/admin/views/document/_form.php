<?php
/* @var $this DocumentController */
/* @var $model Document */
/* @var $form CActiveForm */
?>
<script src="<?php echo Yii::app()->baseUrl . '/assets/ckeditor/ckeditor.js'; ?>"></script>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'document-form',
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
        <div class="col-sm-6">
            <div class="col-sm-12">
                <?php echo $form->labelEx($model, 'title', array('class' => 'control-label pull-left')); ?>
            </div>
            <div class="col-sm-12">
                <?php echo $form->error($model, 'title'); ?>
                <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Tiêu đề văn bản...')); ?>
            </div> 
        </div>
        <div class="col-sm-6">
            <div class="col-sm-12">
                <?php echo $form->labelEx($model, 'alias', array('class' => 'control-label pull-left')); ?>
            </div>
            <div class="col-sm-12">
                <?php echo $form->error($model, 'alias'); ?>
                <?php echo $form->textField($model, 'alias', array('readonly' => 'readonly', 'size' => 60, 'maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Địa chỉ URL văn bản...')); ?>
            </div>
        </div>
    </div>
    <?php
    $this->widget('ext.alias.Alias', array(
        'model' => $model,
    ));
    ?>

    <div class="form-group">
        <div class="col-sm-12">
            <div class="col-sm-12">
                <?php echo $form->labelEx($model, 'summary', array('class' => 'control-label pull-left')); ?>
            </div>
            <div class="col-sm-12">
                <?php echo $form->error($model, 'summary'); ?>
                <?php echo $form->textArea($model, 'summary', array('rows' => 6, 'cols' => 50, 'class' => 'form-control', 'placeholder' => 'Thông tin mô tả văn bản...')); ?>
            </div> 
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <div class="col-sm-12">
                <?php echo $form->labelEx($model, 'content', array('class' => 'control-label pull-left')); ?>
            </div>
            <div class="col-sm-12">
                <?php echo $form->error($model, 'content'); ?>
                <?php echo $form->textArea($model, 'content', array('id' => 'content-document', 'rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-6">
            <div class="col-sm-12">
                <?php echo $form->labelEx($model, 'image', array('class' => 'control-label pull-left')); ?>
            </div>
            <div class="col-sm-12">
                <?php echo $form->error($model, 'image'); ?>
                <?php echo $form->textField($model, 'image', array('style' => 'cursor: pointer', 'readonly' => 'readonly', 'onclick' => 'openKCFinder(this)', 'size' => 60, 'maxlength' => 256, 'class' => 'form-control', 'placeholder' => 'Click vào để chọn hình đại diện cho văn bản...')); ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="col-sm-12">
                <?php echo $form->labelEx($model, 'source', array('class' => 'control-label pull-left')); ?> 
            </div>
            <div class="col-sm-12">
                <?php echo $form->error($model, 'source'); ?>
                <?php echo $form->textField($model, 'source', array('size' => 50, 'maxlength' => 128, 'class' => 'form-control', 'placeholder' => 'Nhập tên người đăng văn bản hoặc nguồn văn bản...')); ?>
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
        <div class="col-sm-6">
            <div class="col-sm-12">
                <?php echo $form->labelEx($model, 'seodescription', array('class' => 'control-label pull-left')); ?>
            </div>
            <div class="col-sm-12">
                <?php echo $form->error($model, 'seodescription'); ?>
                <?php echo $form->textArea($model, 'seodescription', array('rows' => 6, 'cols' => 50, 'class' => 'form-control', 'placeholder' => 'Đoạn thông tin mô tả văn bản dùng cho SEO...')); ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="col-sm-12">
                <?php echo $form->labelEx($model, 'seokeyword', array('class' => 'control-label pull-left')); ?>
            </div>
            <div class="col-sm-12">
                <?php echo $form->error($model, 'seokeyword'); ?>
                <?php echo $form->textArea($model, 'seokeyword', array('rows' => 6, 'cols' => 50, 'class' => 'form-control', 'placeholder' => 'Từ khóa mô tả văn bản dùng cho SEO...')); ?>
            </div>
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-12 text-center">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo văn bản' : 'Save', array('class' => 'btn btn-primary btn-xs')); ?>
            <?php echo CHtml::resetButton('Reset', array('class' => 'btn btn-danger btn-xs')); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
    CKEDITOR.replace('content-document', {
        filebrowserBrowseUrl: '<?php echo Yii::app()->baseUrl ?>/assets/ckeditor/kcfinder/browse.php?type=files',
        filebrowserImageBrowseUrl: '<?php echo Yii::app()->baseUrl ?>/assets/ckeditor/kcfinder/browse.php?type=source',
        filebrowserFlashBrowseUrl: '<?php echo Yii::app()->baseUrl ?>/assets/ckeditor/kcfinder/browse.php?type=flash',
        filebrowserVideoBrowseUrl: '<?php echo Yii::app()->baseUrl ?>/assets/ckeditor/kcfinder/browse.php?type=media',
        filebrowserImageUploadUrl: '<?php echo Yii::app()->baseUrl ?>/assets/ckeditor/kcfinder/upload.php?type=source',
        filebrowserFlashUploadUrl: '<?php echo Yii::app()->baseUrl ?>/assets/ckeditor/kcfinder/upload.php?type=flash',
        filebrowserVideoUploadUrl: '<?php echo Yii::app()->baseUrl ?>/assets/ckeditor/kcfinder/upload.php?type=media',
        filebrowserUploadUrl: '<?php echo Yii::app()->baseUrl ?>/assets/ckeditor/kcfinder/upload.php?type=files',
    });
</script>