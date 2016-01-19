<?php
$this->breadcrumbs = array(
    'Rights' => Rights::getBaseUrl(),
    Rights::t('core', 'Tasks'),
);
?>

<div id="tasks">
    <h3 class="text-primary"><?php echo Rights::t('core', 'Chỉ định'); ?></h3>
    <p><code>
            <?php echo Rights::t('core', 'Là sự phân quyền cho phép thực hiện nhiều thao tác(operations).'); ?><br />
        </code></p>

    <p class="btn btn-xs alert-warning">
        <?php
        echo CHtml::link(Rights::t('core', '<i class="fa fa-plus-circle"></i> Tạo thêm chỉ định'), array('authItem/create', 'type' => CAuthItem::TYPE_TASK), array(
            'class' => 'add-task-link',
        ));
        ?>
    </p>
    <div class="well">


        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider' => $dataProvider,
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
            'emptyText' => Rights::t('core', 'Không tồn tại chỉ định'),
            'htmlOptions' => array('class' => 'grid-view task-table'),
            'columns' => array(
                array(
                    'header' => 'STT',
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                ),
                array(
                    'name' => 'name',
                    'header' => Rights::t('core', 'Tên chỉ định'),
                    'type' => 'raw',
                    'htmlOptions' => array('class' => 'name-column'),
                    'value' => '$data->getGridNameLink()',
                ),
                array(
                    'name' => 'description',
                    'header' => Rights::t('core', 'Mô tả'),
                    'type' => 'raw',
                    'htmlOptions' => array('class' => 'description-column'),
                ),
                array(
                    'name' => 'bizRule',
                    'header' => Rights::t('core', 'Quy luật Business'),
                    'type' => 'raw',
                    'htmlOptions' => array('class' => 'bizrule-column'),
                    'visible' => Rights::module()->enableBizRule === true,
                ),
                array(
                    'name' => 'data',
                    'header' => Rights::t('core', 'Data'),
                    'type' => 'raw',
                    'htmlOptions' => array('class' => 'data-column'),
                    'visible' => Rights::module()->enableBizRuleData === true,
                ),
                array(
                    'header' => '&nbsp;',
                    'type' => 'raw',
                    'htmlOptions' => array('class' => 'actions-column'),
                    'value' => '$data->getDeleteTaskLink()',
                ),
            )
        ));
        ?>
        <p class="info"><?php echo Rights::t('core', '<i class="text-info">Giá trị trong dấu ngoặc vuông cho biết có bao nhiêu quyền được tạo</i>'); ?></p>
    </div>
</div>