<?php
$this->breadcrumbs = array(
    'Rights' => Rights::getBaseUrl(),
    Rights::t('core', 'Generate items'),
);
?>

<div id="generator">
    <h3 class="text-primary"><?php echo Rights::t('core', 'Tạo ControllerAction'); ?></h3>
    <div class="well">
        <div class="form alert-info">
            <?php $form = $this->beginWidget('CActiveForm'); ?>
            <div class="row">
                <table class="table table-bordered table-responsive table-condensed table-hover" style="margin-bottom: 0;">
                    <tbody>
                        <tr class="application-heading-row">
                            <th colspan="3"><?php echo Rights::t('core', 'Application'); ?></th>
                        </tr>
                        <?php
                        $this->renderPartial('_generateItems', array(
                            'model' => $model,
                            'form' => $form,
                            'items' => $items,
                            'existingItems' => $existingItems,
                            'displayModuleHeadingRow' => true,
                            'basePathLength' => strlen(Yii::app()->basePath),
                        ));
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
                    <?php echo CHtml::submitButton(Rights::t('core', 'Tạo acction'), array('class' => 'btn btn-primary btn-sm')); ?>
                </div>
            </div>

            <?php $this->endWidget(); ?>

        </div>
    </div>

</div>