<div class="row">
    <?php
    /* @var $this UserController */
    /* @var $model User */
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => '<i class="fa fa-home"></i> Trang chủ', 'url' => array('site/index')),
            array(
                'name' => 'Thông tin' . " " . $model->firstname,
            ),
        ),
    ));
    ?>   
</div>
<?php if (isset($model->id) && $model->id == Yii::app()->user->id || Yii::app()->user->getState('roler') == 'admin'): ?>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
            <div class="panel panel-warning">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center">
                            <?php echo $model->showphoto_from_database(); ?>
                            <br>
                            <div class="label label-warning" style="padding: 5px;"><a href="<?= Yii::app()->baseUrl ?>/admin/user/update/id/<?= $model->id ?>"><?= $model->fullname ?></a></div>
                        </div>
                        <div class=" col-md-9 col-lg-9 "> 
                            <?php
                            $this->widget('zii.widgets.CDetailView', array(
                                'data' => $model,
                                'attributes' => array(
                                    'username',
                                    'email',
                                    'phone',
                                    array(
                                        'label' => 'Quyền',
                                        'type' => 'raw',
                                        'value' => $model->getRoles()[$model->role],
                                    ),
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
                                    'note',
                                ),
                            ));
                            ?>
                        </div>
                    </div>
                </div>
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


