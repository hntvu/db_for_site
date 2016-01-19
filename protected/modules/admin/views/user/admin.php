<div class="row">
    <?php
    /* @var $this UserController */
    /* @var $model User */
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => '<i class="fa fa-home"></i> Trang chủ', 'url' => array('site/index')),
            array('name' => 'Quản lý thành viên',),
        ),
    ));
    ?>
</div>

<div class="row">
    <div class="col-lg-12">
        <h6 class="text-info lable-admin">quản lý</h6>  
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'user-grid',
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
                        'class' => 'col-lg-1',
                    ),
                    'htmlOptions' => array('class' => 'text-center'),
                    'header' => 'STT',
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                ),
                array(
                    'headerHtmlOptions' => array(
                        'class' => 'col-lg-2',
                    ),
                    'name' => 'username',
                    'header' => CHtml::encode($model->getAttributeLabel('username')),
                    'type' => 'raw',
                    'value' => '$data->username',
                    'filter' => CHtml::activeTextField($model, 'username'),
                ),
                array(
                    'headerHtmlOptions' => array(
                        'class' => 'col-lg-2',
                    ),
                    'name' => 'fullname',
                    'header' => CHtml::encode($model->getAttributeLabel('fullname')),
                    'type' => 'raw',
                    'value' => '$data->fullname',
                    'filter' => CHtml::activeTextField($model, 'fullname'),
                ),
                array(
                    'headerHtmlOptions' => array(
                        'class' => 'col-lg-2',
                    ),
                    'htmlOptions' => array('class' => 'text-center'),
                    'name' => 'email',
                    'header' => CHtml::encode($model->getAttributeLabel('email')),
                    'type' => 'raw',
                    'value' => '$data->email',
                    'filter' => CHtml::activeTextField($model, 'email'),
                ),
                array(
                    'headerHtmlOptions' => array(
                        'class' => 'col-lg-2',
                    ),
                    'name' => 'phone',
                    'header' => CHtml::encode($model->getAttributeLabel('phone')),
                    'type' => 'raw',
                    'value' => '$data->phone',
                    'filter' => CHtml::activeTextField($model, 'phone'),
                ),
                array(
                    'headerHtmlOptions' => array(
                        'class' => 'col-lg-2',
                    ),
                    'htmlOptions' => array('class' => 'text-center'),
                    'name' => 'role',
                    'header' => CHtml::encode($model->getAttributeLabel('role')),
                    'type' => 'raw',
                    'value' => array($model, 'getRolesADMN'),
                    'filter' => User::model()->getRoles(),
                ),
                array(
                    'class' => 'CButtonColumn',
                    'headerHtmlOptions' => array(
                        'class' => 'col-lg-1',
                    ),
                    'header' => 'Xem/Sửa/Xóa',
                    'template' => '{view}{update}{delete}',
                    'deleteConfirmation' => 'Bạn muốn xóa thành viên này?',
                    'buttons' => array(
                        'view' => array(
                            'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Xem')),
                            'label' => '<i class="fa fa-eye"></i>',
                            'imageUrl' => false,
                        ),
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
    </div>
</div>

