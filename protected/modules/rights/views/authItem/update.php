<?php
$this->breadcrumbs = array(
    'Rights' => Rights::getBaseUrl(),
    Rights::getAuthItemTypeNamePlural($model->type) => Rights::getAuthItemRoute($model->type),
    $model->name,
);
?>

<div id="updatedAuthItem">

    <h3 class="text-primary">
        <?php
        echo Rights::t('core', 'Update :name', array(
            ':name' => $model->name,
            ':type' => Rights::getAuthItemTypeName($model->type),
        ));
        ?>
    </h3>
    <div class="well well-sm">
        <?php $this->renderPartial('_form', array('model' => $formModel)); ?>
    </div>

    <div class="relations span-11 last">

        <h3 class="text-primary"><?php echo Rights::t('core', 'Mối liên hệ'); ?></h3>
        <div class="well well-sm">
            <?php if ($model->name !== Rights::module()->superuserName): ?>

                <div class="parents">

                    <h4><?php echo Rights::t('core', 'Thành phần cha'); ?></h4>

                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'dataProvider' => $parentDataProvider,
                        //'template' => '{items}',
                        'id' => 'webmaster-grid',
                        'itemsCssClass' => 'table table-bordered table-condensed text-center',
                        'summaryText' => 'Hiển thị {start} <i class="fa fa-long-arrow-right"></i> {end} của {count} kết quả',
                        //'template' => "{items}\n{pager}",
                        'pager' => array(
                            'class' => 'CLinkPager',
                            'header' => '',
                            'prevPageLabel' => '<i class="fa fa-angle-left"></i>',
                            'nextPageLabel' => '<i class="fa fa-angle-right"></i>',
                            'firstPageLabel' => '<i class="fa fa-angle-double-left"></i>',
                            'lastPageLabel' => '<i class="fa fa-angle-double-right"></i>',
                            'maxButtonCount' => 5, // defalut 10  
                            // css class         
                            'firstPageCssClass' => '', //default "first"
                            'lastPageCssClass' => '', //default "last"
                            'previousPageCssClass' => '', //default "previours"
                            'nextPageCssClass' => '', //default "next"
                            'internalPageCssClass' => '', //default "page"
                            'selectedPageCssClass' => 'select_page', //default "selected"
                            'hiddenPageCssClass' => 'hidden_page', //default "hidden" 
                            'htmlOptions' => array(
                                'class' => '',
                                'style' => '',
                                'id' => ''
                            ),
                        ),
                        'hideHeader' => true,
                        'emptyText' => Rights::t('core', 'This item has no parents.'),
                        'htmlOptions' => array('class' => 'grid-view parent-table mini'),
                        'columns' => array(
                            array(
                                'header' => 'STT',
                                'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                            ),
                            array(
                                'name' => 'name',
                                'header' => Rights::t('core', 'Name'),
                                'type' => 'raw',
                                'htmlOptions' => array('class' => 'name-column'),
                                'value' => '$data->getNameLink()',
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
                                'value' => '',
                            ),
                        )
                    ));
                    ?>

                </div>

                <div class="children">

                    <h4><?php echo Rights::t('core', 'Thành phần con'); ?></h4>

                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'dataProvider' => $childDataProvider,
                        //'template' => '{items}',
                        'id' => 'webmaster-grid',
                        'itemsCssClass' => 'table table-bordered table-condensed text-center',
                        'summaryText' => 'Hiển thị {start} <i class="fa fa-long-arrow-right"></i> {end} của {count} kết quả',
                        //'template' => "{items}\n{pager}",
                        'pager' => array(
                            'class' => 'CLinkPager',
                            'header' => '',
                            'prevPageLabel' => '<i class="fa fa-angle-left"></i>',
                            'nextPageLabel' => '<i class="fa fa-angle-right"></i>',
                            'firstPageLabel' => '<i class="fa fa-angle-double-left"></i>',
                            'lastPageLabel' => '<i class="fa fa-angle-double-right"></i>',
                            'maxButtonCount' => 5, // defalut 10  
                            // css class         
                            'firstPageCssClass' => '', //default "first"
                            'lastPageCssClass' => '', //default "last"
                            'previousPageCssClass' => '', //default "previours"
                            'nextPageCssClass' => '', //default "next"
                            'internalPageCssClass' => '', //default "page"
                            'selectedPageCssClass' => 'select_page', //default "selected"
                            'hiddenPageCssClass' => 'hidden_page', //default "hidden" 
                            'htmlOptions' => array(
                                'class' => '',
                                'style' => '',
                                'id' => ''
                            ),
                        ),
                        'hideHeader' => true,
                        'emptyText' => Rights::t('core', 'This item has no children.'),
                        'htmlOptions' => array('class' => 'grid-view parent-table mini'),
                        'columns' => array(
                            array(
                                'header' => 'STT',
                                'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                            ),
                            array(
                                'name' => 'name',
                                'header' => Rights::t('core', 'Name'),
                                'type' => 'raw',
                                'htmlOptions' => array('class' => 'name-column'),
                                'value' => '$data->getNameLink()',
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
                                'value' => '$data->getRemoveChildLink()',
                            ),
                        )
                    ));
                    ?>

                </div>

                <div class="addChild">

                    <h5><?php echo Rights::t('core', 'Thêm thành phần con'); ?></h5>

                    <?php if ($childFormModel !== null): ?>

                        <?php
                        $this->renderPartial('_childForm', array(
                            'model' => $childFormModel,
                            'itemnameSelectOptions' => $childSelectOptions,
                        ));
                        ?>

                    <?php else: ?>

                        <p class="info"><?php echo Rights::t('core', 'No children available to be added to this item.'); ?>

                        <?php endif; ?>

                </div>

            <?php else: ?>

                <p class="info">
                    <?php echo Rights::t('core', 'No relations need to be set for the superuser role.'); ?><br />
                    <?php echo Rights::t('core', 'Super users are always granted access implicitly.'); ?>
                </p>

            <?php endif; ?>
        </div>


    </div>

</div>