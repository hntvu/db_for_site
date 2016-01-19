<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'htmlOptions' => array(
            'class' => 'form-inline',
        ),
    ));
    ?>
    <div class="form-group">
        <div class="col-sm-12">
            <?php echo $form->dropDownList($model, 'itemname', $itemnameSelectOptions, array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'itemname'); ?>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <?php echo CHtml::submitButton(Rights::t('core', 'Thêm'), array('class' => 'btn btn-primary btn-sm')); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div>