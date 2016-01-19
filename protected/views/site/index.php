<div class="row">
    <div class="col-lg-12">
        <div class="panelNews">
            <div class="panel" >
                <div class="panel-heading">
                    <div class="panel-title"><a>Tin tức - Sự kiện</a></div>                        
                </div>     
                <div class="panel-body" >
                    <div class="col-lg-6 col-sm-6">
                        <?php if (Yii::app()->user->hasFlash('LocalEmpty')) : ?>
                            <?php if (Yii::app()->user->hasFlash('LocalEmpty')) echo Yii::app()->user->getFlash('LocalEmpty'); ?>
                        <?php else: ?>
                            <div class="row">
                                <a href="<?php echo Yii::app()->createUrl($modelNewsLocal->alias . "-" . substr(hash('sha512', $modelNewsLocal->id), 0, 5) . $modelNewsLocal->id); ?>">
                                    <img src="<?= Yii::app()->baseUrl ?>/uploads/source/tintuc/<?= $modelNewsLocal->image ?>" class="img-thumbnail"/>
                                </a>
                            </div>
                            <div class="row">
                                <h4><a href="<?php echo Yii::app()->createUrl($modelNewsLocal->alias . "-" . substr(hash('sha512', $modelNewsLocal->id), 0, 5) . $modelNewsLocal->id); ?>"><?= $modelNewsLocal->title ?></a></h4>
                                <h6>
                                    <i>
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        <time class="timeago" datetime="<?= Yii::app()->dateFormatter->format('y-MM-dd H:mm:ss', strtotime($modelNewsLocal->datecreate)) ?>"></time>
                                    </i>
                                </h6>
                                <div class="text-justify">
                                    <p><?= $modelNewsLocal->summary ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6 col-sm-6 subpanel">
                        <?php if (Yii::app()->user->hasFlash('LocalEmptyMore')) : ?>
                            <?php if (Yii::app()->user->hasFlash('LocalEmptyMore')) echo Yii::app()->user->getFlash('LocalEmptyMore'); ?>
                        <?php else: ?>
                            <?php foreach ($modelLocalMore as $LocalMore): ?>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-5 col-xs-6">
                                        <a href="<?php echo Yii::app()->createUrl($LocalMore->alias . "-" . substr(hash('sha512', $LocalMore->id), 0, 5) . $LocalMore->id); ?>">
                                            <img src="<?= Yii::app()->baseUrl ?>/uploads/source/tintuc/<?= $LocalMore->image ?>" class="img-thumbnail">
                                        </a>
                                    </div>
                                    <div class="col-lg-8 col-sm-7 col-xs-6 padding-pn">
                                        <a href="<?php echo Yii::app()->createUrl($LocalMore->alias . "-" . substr(hash('sha512', $LocalMore->id), 0, 5) . $LocalMore->id); ?>">
                                            <?= $LocalMore->title ?>
                                        </a>
                                        <h6>
                                            <i>
                                                <span class="glyphicon glyphicon-calendar"></span>
                                                <time class="timeago" datetime="<?= Yii::app()->dateFormatter->format('y-MM-dd H:mm:ss', strtotime($LocalMore->datecreate)) ?>"></time>
                                            </i>
                                        </h6>
                                    </div> 
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>                     
            </div> 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-sm-6">
        <div class="panelNews">
            <div class="panel" >
                <div class="panel-heading">
                    <div class="panel-title"><a>Tin Công Nghệ</a></div>                        
                </div>     
                <div class="panel-body" >
                    <?php if (Yii::app()->user->hasFlash('emptyData')) : ?>
                        <?php if (Yii::app()->user->hasFlash('emptyData')) echo Yii::app()->user->getFlash('emptyData'); ?>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <h4><a href="<?php echo Yii::app()->createUrl($modelNewsTech->alias . "-" . substr(hash('sha512', $modelNewsTech->id), 0, 5) . $modelNewsTech->id); ?>"><?= $modelNewsTech->title ?></a></h4>
                                <div class="col-lg-6 col-sm-6 image-panel-sub">
                                    <a href="<?php echo Yii::app()->createUrl($modelNewsTech->alias . "-" . substr(hash('sha512', $modelNewsTech->id), 0, 5) . $modelNewsTech->id); ?>">
                                        <img src="<?= Yii::app()->baseUrl ?>/uploads/source/tintuc/<?= $modelNewsTech->image ?>" class="img-thumbnail">
                                    </a>
                                </div>
                                <h6>
                                    <i>
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        <time class="timeago" datetime="<?= Yii::app()->dateFormatter->format('y-MM-dd H:mm:ss', strtotime($modelNewsTech->datecreate)) ?>"></time>
                                    </i>
                                </h6>
                                <div class="text-justify">
                                    <p><?= $modelNewsTech->summary ?></p>
                                </div>
                            </div> 
                        </div>
                    <?php endif; ?>
                </div>                     
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <?php if (Yii::app()->user->hasFlash('emptyDataMore')) : ?>
                        <?php if (Yii::app()->user->hasFlash('emptyDataMore')) echo Yii::app()->user->getFlash('emptyDataMore'); ?>
                    <?php else: ?>
                        <?php foreach ($modelTechMore as $TechMore): ?>
                            <div class="wp-panel">
                                <a href="<?php echo Yii::app()->createUrl($TechMore->alias . "-" . substr(hash('sha512', $TechMore->id), 0, 5) . $TechMore->id); ?>" class="col-lg-4 col-sm-4 col-xs-6 image-panel-sub">
                                    <img src="<?= Yii::app()->baseUrl ?>/uploads/source/tintuc/<?= $TechMore->image ?>" class="img-thumbnail">
                                </a>
                                <h6>
                                    <i>
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        <time class="timeago" datetime="<?= Yii::app()->dateFormatter->format('y-MM-dd H:mm:ss', strtotime($TechMore->datecreate)) ?>"></time>
                                    </i>
                                </h6>
                                <a href="<?php echo Yii::app()->createUrl($TechMore->alias . "-" . substr(hash('sha512', $TechMore->id), 0, 5) . $TechMore->id); ?>"><?= $TechMore->title ?></a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-6 col-sm-6">
        <div class="panelNews">
            <div class="panel" >
                <div class="panel-heading">
                    <div class="panel-title"><a>Thông Báo</a></div>                        
                </div>     
                <div class="panel-body" >
                    <?php if (Yii::app()->user->hasFlash('NofifyEmpty')) : ?>
                        <?php if (Yii::app()->user->hasFlash('NofifyEmpty')) echo Yii::app()->user->getFlash('NofifyEmpty'); ?>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <h4><a href="<?php echo Yii::app()->createUrl($modelNewsNotify->alias . "-" . substr(hash('sha512', $modelNewsNotify->id), 0, 5) . $modelNewsNotify->id); ?>"><?= $modelNewsNotify->title ?></a></h4>
                                <div class="col-lg-6 col-sm-6 image-panel-sub">
                                    <a href="<?php echo Yii::app()->createUrl($modelNewsNotify->alias . "-" . substr(hash('sha512', $modelNewsNotify->id), 0, 5) . $modelNewsNotify->id); ?>">
                                        <img src="<?= Yii::app()->baseUrl ?>/uploads/source/tintuc/<?= $modelNewsNotify->image ?>" class="img-thumbnail">
                                    </a>
                                </div>
                                <h6>
                                    <i>
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        <time class="timeago" datetime="<?= Yii::app()->dateFormatter->format('y-MM-dd H:mm:ss', strtotime($modelNewsNotify->datecreate)) ?>"></time>
                                    </i>
                                </h6>
                                <div class="text-justify">
                                    <p><?= $modelNewsNotify->summary ?></p>
                                </div>
                            </div> 
                        </div>
                    <?php endif; ?>
                </div>                     
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <?php if (Yii::app()->user->hasFlash('MoreNofifyEmpty')) : ?>
                        <?php if (Yii::app()->user->hasFlash('MoreNofifyEmpty')) echo Yii::app()->user->getFlash('MoreNofifyEmpty'); ?>
                    <?php else: ?>
                        <?php foreach ($modelNotifyMore as $NotifyMore): ?>
                            <div class="wp-panel">
                                <a href="<?php echo Yii::app()->createUrl($NotifyMore->alias . "-" . substr(hash('sha512', $NotifyMore->id), 0, 5) . $NotifyMore->id); ?>" class="col-lg-4 col-sm-4 col-xs-6 image-panel-sub">
                                    <img src="<?= Yii::app()->baseUrl ?>/uploads/source/tintuc/<?= $NotifyMore->image ?>" class="img-thumbnail">
                                </a>
                                <h6>
                                    <i>
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        <time class="timeago" datetime="<?= Yii::app()->dateFormatter->format('y-MM-dd H:mm:ss', strtotime($NotifyMore->datecreate)) ?>"></time>
                                    </i>
                                </h6>
                                <a href="<?php echo Yii::app()->createUrl($NotifyMore->alias . "-" . substr(hash('sha512', $NotifyMore->id), 0, 5) . $NotifyMore->id); ?>"><?= $NotifyMore->title ?></a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->widget('ext.timeago.JTimeAgo', array(
    'selector' => '.timeago',
    'settings' => array(
        'allowFuture' => true,
        'strings' => 'js:{
            prefixAgo: null,
            prefixFromNow: "",
            suffixAgo: "",
            suffixFromNow: null,
            seconds: "1 giây trước",
            minute: "1 phút trước",
            minutes: "%d phút trước",
            hour: "1 giờ trước",
            hours: "%d giờ trước",
            day: "1 ngày trước",
            days: "%d ngày trước",
            month: "1 tháng trước",
            months: "%d tháng trước",
            year: "1 năm trước",
            years: "%d năm trước",
            numbers: []}',)
));
?>