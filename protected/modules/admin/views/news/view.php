<div class="row">
    <?php
    /* @var $this NewsController */
    /* @var $model News */

    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => '<i class="fa fa-home"></i> Trang chủ', 'url' => array('site/index')),
            array('name' => 'Danh sách tin', 'url' => array('news/index')),
            array('name' => 'Chi tiết tin',),
        ),
    ));
    ?>   
</div>
<?php if (isset($model->usercreate) && $model->usercreate == Yii::app()->user->id || Yii::app()->user->getState('roler') == 'admin'): ?>
    <div class="row">
        <div class="col-lg-12">
            <h6 class="text-info lable-admin"><a href="<?= Yii::app()->baseUrl ?>/admin/news/update/id/<?= $model->id ?>"><?= $model->title ?></a></h6>  
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <?php
                $this->widget('zii.widgets.CDetailView', array(
                    'data' => $model,
                    'attributes' => array(
                        array(
                            'label' => 'Danh mục',
                            'type' => 'raw',
                            'value' => $model->menuNews->title,
                        ),
                        'title',
                        'summary',
                        array(
                            'label' => 'Nội dung',
                            'type' => 'raw',
                            'value' => $model->content,
                        ),
                        'image',
                        'seodescription',
                        'seokeyword',
                        'source',
                        'views',
                        array(
                            'label' => 'Ngày tạo',
                            'type' => 'raw',
                            'value' => Yii::app()->dateFormatter->format("H:mm:ss dd/MM/y", strtotime($model->datecreate)),
                        ),
                        array(
                            'label' => 'Ngày cập nhật',
                            'type' => 'raw',
                            'value' => (isset($model->lastupdate)) ? Yii::app()->dateFormatter->format('H:mm:ss dd/MM/y', strtotime($model->lastupdate)) : "",
                        ),
                        array(
                            'label' => 'Người tạo',
                            'type' => 'raw',
                            'value' => $model->newsUser->fullname,
                        ),
                    ),
                ));
                ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <?php echo Yii::app()->bootstrap->registerJS(); ?>
    <div class="row">
        <div class="col-lg-12">
            <p class="alert alert-danger">Bạn không được phép thực hiện hành động này</p>
        </div>
    </div>
<?php endif; ?>

