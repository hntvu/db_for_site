<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="col-lg-9 col-sm-9">
    <?php echo $content; ?>
</div>
<!--SIDEBAR-->
<div class="col-lg-3 col-sm-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="panelNews">
                <div class="panel" >
                    <div class="panel-heading">
                        <div class="panel-title"><a href="<?= Yii::app()->createUrl('van-ban/tat-ca'); ?>">Văn bản - Tài liệu</a></div>                        
                    </div>     
                    <div class="panel-body" >
                        <?php $this->widget('DocumentWidget'); ?>
                    </div>                     
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panelNews">
                <div class="panel" >
                    <div class="panel-heading">
                        <div class="panel-title"><a>Hỗ trợ kỹ thuật</a></div>                        
                    </div>     
                    <div class="panel-body" >
                        <li><a href="#" class="text-danger">Dữ liệu đang cập nhật!</a></li>
                    </div>                     
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>