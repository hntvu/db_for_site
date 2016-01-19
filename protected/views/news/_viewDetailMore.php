<li>
    <a style="line-height: 2em; padding-left: 1.5em;" href="<?php echo Yii::app()->createUrl($data->alias."-".substr(hash('sha512', $data->id),0,5).$data->id); ?>"><i class="fa fa-angle-double-right"></i> 
        <?= $data->title; ?>
    </a>
    <i style="font-size: .9em;">(<?= Yii::app()->dateFormatter->format('dd/MM/y', strtotime($data->datecreate)) ?>)</i>
</li>
