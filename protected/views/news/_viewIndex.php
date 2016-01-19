<div class="indexNews text-justify">
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <h4><strong><a href="<?php echo Yii::app()->createUrl($data->alias."-".substr(hash('sha512', $data->id),0,5).$data->id); ?>" class="post-title"><?php echo CHtml::encode($data->title); ?></a></strong></h4>
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
            <a class="col-lg-4 col-xs-12" href="<?php echo Yii::app()->createUrl($data->alias."-".substr(hash('sha512', $data->id),0,5).$data->id); ?>">
                <img src="<?php echo Yii::app()->request->baseUrl ?>/uploads/source/tintuc/<?= $data->image; ?>" alt="" class="img-thumbnail">
            </a>
            <div class="col-lg-8 col-xs-12">
                <p><?= $data->summary; ?></p>
                <a style="font-size: .9em;" href="<?php echo Yii::app()->createUrl($data->alias."-".substr(hash('sha512', $data->id),0,5).$data->id); ?>" class="pull-right"> Xem chi tiết <i class="fa fa-angle-double-right"></i></a>
            </div>
        </div>
    </div>
</div>
