<?php
$this->breadcrumbs = array(
    'Rights' => Rights::getBaseUrl(),
    Rights::t('core', 'Assignments') => array('assignment/view'),
    $model->getName(),
);
?>
<div id="userAssignments">
    <div class="alert-info col-lg-12">
        <div class="col-lg-6">
            <h4 class="text-info"><?php
                echo Rights::t('core', 'Tạo quyền truy cập cho :username', array(
                    ':username' => $model->getName()
                ));
                ?>
            </h4>
            <div class="well well-sm">
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'dataProvider' => $dataProvider,
                    'id' => 'webmaster-grid',
                    'itemsCssClass' => 'table table-bordered table-condensed text-center',
                    'template' => '{items}',
                    'hideHeader' => true,
                    'emptyText' => Rights::t('core', 'This user has not been assigned any items.'),
                    'htmlOptions' => array('class' => 'grid-view user-assignment-table mini'),
                    'columns' => array(
                        array(
                            'name' => 'name',
                            'header' => Rights::t('core', 'Name'),
                            'type' => 'raw',
                            'htmlOptions' => array('class' => 'name-column'),
                            'value' => '$data->getNameText()',
                        ),
                        array(
                            'name' => 'type',
                            'header' => Rights::t('core', 'Type'),
                            'type' => 'raw',
                            'htmlOptions' => array('class' => 'type-column'),
                            'value' => '$data->getTypeText()',
                        ),
                        array(
                            'header' => '&nbsp;',
                            'type' => 'raw',
                            'htmlOptions' => array('class' => 'actions-column'),
                            'value' => '$data->getRevokeAssignmentLink()',
                        ),
                    )
                ));
                ?>
            </div>
        </div>

        <div class="col-lg-6">
            <h4 class="text-info"><?php echo Rights::t('core', 'Thêm thành phần'); ?></h4>
            <div class="well well-sm">
                <?php if ($formModel !== null): ?>
                    <?php
                    $this->renderPartial('_form', array(
                        'model' => $formModel,
                        'itemnameSelectOptions' => $assignSelectOptions,
                    ));
                    ?>
                <?php else: ?>
                    <p class="info">
                        <?php echo Rights::t('core', 'Đã hết quyền phân công cho người dùng này'); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>


</div>
