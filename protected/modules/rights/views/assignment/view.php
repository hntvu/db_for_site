<?php
$this->breadcrumbs = array(
    'Rights' => Rights::getBaseUrl(),
    Rights::t('core', 'Assignments'),
);
?>

<div id="assignments">
    <h3 class="text-primary"><?php echo Rights::t('core', 'Quyền truy cập'); ?></h3>
    <p>
        <code>
            <?php echo Rights::t('core', 'Ghi chú: Bạn có thể tạo quyền truy cập cho từng thành viên hoặc nhóm thành viên'); ?>
        </code>
    </p>
    <div class="well">
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider' => $dataProvider,
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
            'emptyText' => Rights::t('core', 'Thành viên không tồn tại'),
            'htmlOptions' => array('class' => 'grid-view assignment-table'),
            'columns' => array(
                array(
                    'header' => 'STT',
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                ),
                array(
                    'name' => 'name',
                    'header' => Rights::t('core', 'Tên thành viên'),
                    'type' => 'raw',
                    'htmlOptions' => array('class' => 'text-left name-column'),
                    'value' => '$data->getAssignmentNameLink()',
                ),
                array(
                    'name' => 'assignments',
                    'header' => Rights::t('core', 'Vai trò'),
                    'type' => 'raw',
                    'htmlOptions' => array('class' => 'role-column'),
                    'value' => '$data->getAssignmentsText(CAuthItem::TYPE_ROLE)',
                ),
                array(
                    'name' => 'assignments',
                    'header' => Rights::t('core', 'Chỉ định'),
                    'type' => 'raw',
                    'htmlOptions' => array('class' => 'task-column'),
                    'value' => '$data->getAssignmentsText(CAuthItem::TYPE_TASK)',
                ),
                array(
                    'name' => 'assignments',
                    'header' => Rights::t('core', 'Thao tác'),
                    'type' => 'raw',
                    'htmlOptions' => array('class' => 'operation-column'),
                    'value' => '$data->getAssignmentsText(CAuthItem::TYPE_OPERATION)',
                ),
            )
        ));
        ?>
    </div>


</div>