<div class="row">
    <?php
    /* @var $this MenuController */
    /* @var $model Menu */
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => '<i class="fa fa-home"></i> Trang chủ', 'url' => array('site/index')),
            array('name' => 'Xóa danh mục',),
        ),
    ));
    ?>
</div>

<div class="row">
    <div class="col-lg-12">
        <h6 class="text-info lable-admin">Xóa danh mục</h6>  
    </div>
</div>


<?php
$pageSize = Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']);
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'menu-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'itemsCssClass' => 'table table-condensed table-striped',
    'summaryText' => 'Hiển thị {start} <i class="fa fa-long-arrow-right"></i> {end} của {count} kết quả',
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
    'columns' => array(
        array(
            'htmlOptions' => array('class' => 'text-center'),
            'header' => 'STT',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        ),
        array(
            'headerHtmlOptions' => array(
                'class' => 'col-lg-3',
            ),
            'name' => 'title',
            'header' => CHtml::encode($model->getAttributeLabel('title')),
            'type' => 'raw',
            'value' => '$data->title',
        ),
        array(
            'headerHtmlOptions' => array(
                'class' => 'col-lg-3',
            ),
            'name' => 'alias',
            'header' => CHtml::encode($model->getAttributeLabel('alias')),
            'type' => 'raw',
            'value' => '$data->alias',
        ),
         array(
            'headerHtmlOptions' => array(
                'class' => 'col-lg-3',
            ),
            'name' => 'controller',
            'header' => CHtml::encode($model->getAttributeLabel('controller')),
            'type' => 'raw',
            'value' => '$data->controller',
        ),
        array(
            'headerHtmlOptions' => array(
                'class' => 'col-lg-1',
            ),
            'htmlOptions' => array('class' => 'text-center'),
            'name' => 'status',
            'header' => CHtml::encode($model->getAttributeLabel('status')),
            'type' => 'raw',
            'value' => '$data->status == 1 ? "<i class=' . "text-success" . '>Enable</i>":"<i class=' . "text-danger" . '>Disable</i>"',
            'filter' => Yii::app()->params['statusMenu'],
        ),
        array(
            'headerHtmlOptions' => array(
                'class' => 'col-lg-2',
            ),
            'htmlOptions' => array('class' => 'text-center'),
            'name' => 'parent',
            'header' => CHtml::encode($model->getAttributeLabel('parent')),
            'type' => 'raw',
            'value' => '$data->parent != 0 ? "<i>".$data->Menu->title."</i>" : "<i>Danh mục cha</i>" ',
            'filter' => Menu::model()->getParentMenu(),
        ),
        array(
            'class' => 'CButtonColumn',
            'headerHtmlOptions' => array(
                'class' => 'col-lg-1',
            ),
            'header' => CHtml::dropDownList('pageSize', $pageSize, array(10 => 10, 20 => 20, 50 => 50, 100 => 100), array(
                'onchange' => "$.fn.yiiGridView.update('menu-grid',{ data:{pageSize: $(this).val() }})",
            )),
            'template' => '{update}{delete}',
            'deleteConfirmation' => 'Bạn muốn xóa danh mục này?',
            'buttons' => array(
                'update' => array(
                    'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Cập nhật')),
                    'label' => '<i class="fa fa-pencil" style="color:#ec8c1b"></i>',
                    'imageUrl' => false,
                ),
                'delete' => array(
                    'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Xóa')),
                    'label' => '<i class="fa fa-trash-o" style="color:red;"></i>',
                    'imageUrl' => false,
                ),
            ),
        ),
    ),
));
?>
<style>
    #menu-grid_c6 select{
        color: #5A7391;
    }
</style>
