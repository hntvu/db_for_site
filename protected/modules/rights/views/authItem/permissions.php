<?php
$this->breadcrumbs = array(
    'Rights' => Rights::getBaseUrl(),
    Rights::t('core', 'Permissions'),
);
?>

<div id="permissions">
    <h3 class="text-primary"><?php echo Rights::t('core', 'Phân quyền'); ?></h3>
    <p><code><?php echo Rights::t('core', 'Bạn có thể xem và quản lý phân quyền được gán cho mỗi vai trò'); ?></code></p>    
    <p class="btn btn-xs alert-warning">
        <?php
        echo CHtml::link(Rights::t('core', '<i class="fa fa-plus-circle"></i> Thêm controller actions'), array('authItem/generate'), array(
            'class' => 'generator-link',
        ));
        ?>
    </p>
    <div class="col-lg-12 well">
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
            'emptyText' => Rights::t('core', 'Không tìm thấy quyền'),
            'htmlOptions' => array('class' => 'grid-view permission-table'),
            'columns' => $columns,
        ));
        ?>

        <p class="info"> <?php echo Rights::t('core', '<i class="text-info">Rê chuột vào (Thừa hưởng*) để xem mối liên hệ</i>'); ?></p>
    </div>


    <script type="text/javascript">

        /**
         * Attach the tooltip to the inherited items.
         */
        jQuery('.inherited-item').rightsTooltip({
            title: '<?php echo Rights::t('core', 'Lớp kế thừa'); ?>: '
        });

        /**
         * Hover functionality for rights' tables.
         */
        $('#rights tbody tr').hover(function () {
            $(this).addClass('hover'); // On mouse over
        }, function () {
            $(this).removeClass('hover'); // On mouse out
        });

    </script>

</div>
