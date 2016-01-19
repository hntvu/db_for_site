<div class="row">

    <?php
    /* @var $this NewsController */
    /* @var $model News */

    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => '<i class="fa fa-home"></i> Trang chủ', 'url' => array('site/index')),
            array('name' => 'Quản lý tin',),
        ),
    ));
    ?>

</div>

<div class="row">
    <div class="col-lg-12">
        <h6 class="text-info lable-admin">Quản lý tin</h6>  
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="">
            <?php
            $pageSize = Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']);
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'news-grid',
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
                        'headerHtmlOptions' => array(
                            'class' => '',
                        ),
                        'htmlOptions' => array('class' => 'text-center'),
                        'header' => 'STT',
                        'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                    ),
                    array(
                        'headerHtmlOptions' => array(
                            'class' => 'col-lg-6',
                        ),
                        'htmlOptions' => array('class' => 'text-center'),
                        'name' => 'title',
                        'type' => 'raw',
                        'value' => '$data->title',
                        'htmlOptions' => array('class' => 'tc'),
                    ),
                    array(
                        'name' => 'datecreate',
                        'headerHtmlOptions' => array(
                            'class' => 'col-lg-1'
                        ),
                        'htmlOptions' => array('class' => 'text-center'),
                        'header' => 'Ngày tạo',
                        'type' => 'raw',
                        'value' => 'Yii::app()->dateFormatter->format("dd-MM-y", strtotime($data->datecreate))',
                        'filter' => $this->widget('zii.widgets.jui.CJuiDatepicker', array(
                            'name' => 'datepicker',
                            'model' => $model,
                            'attribute' => 'datecreate',
                            'options' => array(
                                'showAnim' => 'slide', //'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                'dateFormat' => 'yy-mm-dd',
                                'showOn' => 'focus', // 'focus', 'button', 'both'
                            )), true)
                    ),
                    array(
                        'headerHtmlOptions' => array(
                            'class' => 'col-lg-2',
                        ),
                        'htmlOptions' => array('class' => 'text-center'),
                        'name' => 'idmenu',
                        'header' => CHtml::encode($model->getAttributeLabel('idmenu')),
                        'type' => 'raw',
                        'value' => '$data->menuNews->title',
                        'filter' => Menu::model()->getChildsMenu(),
                    ),
                    array(
                        'headerHtmlOptions' => array(
                            'class' => 'col-lg-1',
                        ),
                        'htmlOptions' => array('class' => 'text-center'),
                        'name' => 'usercreate',
                        'header' => CHtml::encode($model->getAttributeLabel('usercreate')),
                        'type' => 'raw',
                        'value' => array($model, 'searchEmployees'),
                        'filter' => User::model()->getOpts(),
                    ),
                    array(
                        'headerHtmlOptions' => array(
                            'class' => 'col-lg-1',
                        ),
                        'htmlOptions' => array('class' => 'text-center'),
                        'name' => 'image',
                        'type' => 'raw',
                        'filter' => false,
                        'value' => 'CHtml::image(Yii::app()->baseUrl."/uploads/source/tintuc/".$data->image, "", array("width"=>"100%"))',
                        'htmlOptions' => array('class' => 'tc'),
                    ),
                    array(
                        'class' => 'CButtonColumn',
                        'headerHtmlOptions' => array(
                            'class' => 'col-lg-1',
                        ),
                        'header' => CHtml::dropDownList('pageSize', $pageSize, array(10 => 10, 20 => 20, 50 => 50, 100 => 100), array(
                            'onchange' => "$.fn.yiiGridView.update('news-grid',{ data:{pageSize: $(this).val() }})",
                        )),
                        'template' => '{delete}',
                        'deleteConfirmation' => 'Bạn muốn xóa bài viết này?',
                        'buttons' => array(
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
        </div>
    </div>
</div>
<style>
    #news-grid_c6 select{
        color: #5A7391;
    }
</style>