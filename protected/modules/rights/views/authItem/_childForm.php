<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'htmlOptions' => array(
            'class' => 'form-inline',
        ),
    ));
    ?>
    <div class="form-group">
        <div class="col-lg-5">
            <?php echo $form->dropDownList($model, 'itemname', $itemnameSelectOptions, array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'itemname'); ?>
    </div>

    <div class="form-group">
        <?php echo CHtml::submitButton(Rights::t('core', 'Add'), array('class' => 'btn btn-primary')); ?>
    </div>
    <?php $this->endWidget(); ?>
</div>