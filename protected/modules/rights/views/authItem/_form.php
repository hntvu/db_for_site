<div class="row">
    <div class="form col-lg-12 first">
        <?php if ($model->scenario === 'update'): ?>
            <h3><?php echo Rights::getAuthItemTypeName($model->type); ?></h3>
        <?php endif; ?>

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'htmlOptions' => array(
                'class' => 'form-horizontal',
            ),
        ));
        ?>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'name', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'name', array('maxlength' => 255, 'class' => 'text-field form-control')); ?>
            </div>
            <?php echo $form->error($model, 'name'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'description', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-5">
                <?php echo $form->textField($model, 'description', array('maxlength' => 255, 'class' => 'text-field form-control')); ?>
            </div>
            <?php echo $form->error($model, 'description'); ?>
        </div>


        <?php if (Rights::module()->enableBizRule === true): ?>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'bizRule', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-5">
                    <?php echo $form->textField($model, 'bizRule', array('maxlength' => 255, 'class' => 'text-field form-control')); ?>
                </div>
                <?php echo $form->error($model, 'bizRule'); ?>
            </div>

        <?php endif; ?>

        <?php if (Rights::module()->enableBizRule === true && Rights::module()->enableBizRuleData): ?>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'data', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-5">
                    <?php echo $form->textField($model, 'data', array('maxlength' => 255, 'class' => 'text-field form-control')); ?>
                </div>
                <?php echo $form->error($model, 'data'); ?>
                <p class="hint"><?php echo Rights::t('core', 'Additional data available when executing the business rule.'); ?></p>
            </div>

        <?php endif; ?>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <?php echo CHtml::submitButton(Rights::t('core', 'Save'), array('class' => 'btn btn-xs btn-primary')); ?> | <?php echo CHtml::link(Rights::t('core', 'Cancel'), Yii::app()->user->rightsReturnUrl); ?>
            </div>
        </div>

        <?php $this->endWidget(); ?>

    </div>
</div>
