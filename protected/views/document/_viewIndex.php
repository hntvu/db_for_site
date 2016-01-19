<div class="indexNews text-justify">
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <h4><strong><a href="<?= Yii::app()->createUrl('van-ban', array('noi-dung' => $data->alias)) ?>" class="post-title"><?php echo CHtml::encode($data->title); ?></a></strong></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="post-header-line">
                <span class="glyphicon glyphicon-calendar"></span> <time><?= Yii::app()->dateFormatter->format('dd/MM/y H:mm', strtotime($data->datecreate)); ?></time>
                <!--
                <span class="glyphicon glyphicon-eye-open"></span> <?= $data->views; ?>
                -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="post-content col-lg-12" style="padding: 0;">
            <a class="col-lg-2 col-sm-2 col-xs-3" href="<?= Yii::app()->createUrl('van-ban', array('noi-dung' => $data->alias)) ?>">
                <?php if ($data->image != NULL): ?>
                    <img src="<?php echo Yii::app()->request->baseUrl ?>/uploads/source/vanban/<?= $data->image; ?>" alt="" class="img-thumbnail">
                <?php else: ?>
                    <img src="<?php echo Yii::app()->request->baseUrl ?>/uploads/source/vanban/hinhdaidien.png" alt="" class="img-thumbnail">
                <?php endif; ?>
            </a>
            <div class="col-lg-10 col-sm-10 col-xs-9">
                <p><?= $data->summary; ?></p>
                <a style="font-size: .9em;" href="<?= Yii::app()->createUrl('van-ban', array('noi-dung' => $data->alias)) ?>" class="pull-right"> Xem chi tiết <i class="fa fa-angle-double-right"></i></a>
            </div>
        </div>
    </div>
</div>
