<?php
$this->breadcrumbs = array(
    'Rights' => Rights::getBaseUrl(),
    Rights::t('core', 'Roles'),
);
?>

<div id="roles">
    <h3 class="text-primary"><?php echo Rights::t('core', 'Vai trò'); ?></h3>

    <p>
        <code>
            <?php echo Rights::t('core', 'Vai trò là một nhóm quyền để thực hiện hàng loạt các thao tác(operations) và chỉ định(task).'); ?>
            <?php echo Rights::t('core', 'Vai trò nằm ở mức cao nhất của hệ thống phân cấp ủy quyền và do đó có thể kế thừa từ quyền quản trị, thao tác(operations) hoặc chỉ định(task) khác.'); ?>
        </code>
    </p>

    <p class="btn btn-xs alert-warning">
        <?php
        echo CHtml::link(Rights::t('core', '<i class="fa fa-plus-circle"></i> Tạo thêm vai trò'), array('authItem/create', 'type' => CAuthItem::TYPE_ROLE), array(
            'class' => 'add-role-link',
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
            'emptyText' => Rights::t('core', 'Vai trò không tồn tại'),
            'htmlOptions' => array('class' => 'grid-view role-table'),
            'columns' => array(
                array(
                    'header' => 'STT',
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                ),
                array(
                    'name' => 'name',
                    'header' => Rights::t('core', 'Tên vai trò'),
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
                    'value' => '$data->getDeleteRoleLink()',
                ),
            )
        ));
        ?>
        <p class="info"><?php echo Rights::t('core', '<i class="text-info">Giá trị trong dấu ngoặc vuông cho biết có bao nhiêu quyền được tạo</i>'); ?></p>
    </div>


</div>