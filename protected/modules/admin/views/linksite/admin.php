<div class="row">
    <?php
    /* @var $this LinksiteController */
    /* @var $dataProvider CActiveDataProvider */

    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => '<i class="fa fa-home"></i> Trang chủ', 'url' => array('site/index')),
            array('name' => 'Quản lý Website',),
        ),
    ));
    ?>  
</div>


<div class="row">
    <div class="col-lg-12">
        <h6 class="text-info lable-admin">Quản lý Link Website</h6>  
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="">
            <?php
            $pageSize = Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']);
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'linksite-grid',
                'dataProvider' => $model->search(),
                //'filter' => $model,
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
                            'class' => 'col-lg-1',
                        ),
                        'htmlOptions' => array('class' => 'text-center'),
                        'header' => 'STT',
                        'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                    ),
                    array(
                        'headerHtmlOptions' => array(
                            'class' => 'col-lg-4',
                        ),
                        'name' => 'title',
                        'value' => '$data->title',
                        'filter' => FALSE,
                    ),
                    array(
                        'headerHtmlOptions' => array(
                            'class' => 'col-lg-4',
                        ),
                        'name' => 'link',
                        'value' => '$data->link',
                        'filter' => FALSE,
                    ),
                    array(
                        'headerHtmlOptions' => array(
                            'class' => 'col-lg-2',
                        ),
                        'name' => 'opgroup',
                        'value' => '$data->opgroup',
                        'filter' => FALSE,
                    ),
                    array(
                        'class' => 'CButtonColumn',
                        'headerHtmlOptions' => array(
                            'class' => 'col-lg-1',
                        ),
                        'header' => CHtml::dropDownList('pageSize', $pageSize, array(10 => 10, 20 => 20, 50 => 50, 100 => 100), array(
                            'onchange' => "$.fn.yiiGridView.update('linksite-grid',{ data:{pageSize: $(this).val() }})",
                        )),
                        'template' => '{delete}',
                        'deleteConfirmation' => 'Bạn muốn xóa link này?',
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
    #linksite-grid_c4 select{
        color: #5A7391;
    }
</style>
