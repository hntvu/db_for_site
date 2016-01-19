<div class="row">
    <div class="col-lg-12" id="content-gt">
        <hr class="hr-primary"/>
        <?php
        if (isset($this->breadcrumbs)) {
            $this->widget('zii.widgets.CBreadcrumbs', array(
                'htmlOptions' => array('class' => 'breadcrumb bread-primary'),
                'separator' => '<span style="color:#0099FF;"> <i class="fa fa-caret-right"></i> </span>',
                'tagName' => 'ol',
                'homeLink' => '<li><a href="' . Yii::app()->homeUrl . '"><i class="fa fa-home" style="font-size:1.5em; color:#FF6600;"></i></a></li>',
                'links' => array(
                    'Tìm kiếm',
                ),
            ));
        }
        ?>
        <hr class="hr-primary" style="margin-top: 5px;"/>
    </div>
    <div class="col-lg-12" id="listsearch">
        <?php
        $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $model,
            'itemView' => '_search',
            'emptyText' => 'Chúng tôi không tìm thấy thông tin bạn yêu cầu!',
            'summaryText' => '<div class="pull-left">Tìm thấy <span class="text-info" style="font-weight: 800;">{count}</span> kết quả !</div>',
            'sorterHeader' => 'Sắp xếp theo: ',
            'sortableAttributes' => array('datecreate'),
            //'template' => '{summary} {sorter} {items} {pager}',
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
        ));
        ?> 
    </div>
</div>
<style>
    #listsearch .list-view{
        margin-top: 20px;
    }
</style>
<script>
    $('#listsearch .empty').addClass('text-danger');
</script>
