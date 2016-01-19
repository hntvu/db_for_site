<li>
    <a style="line-height: 2em; padding-left: 1.5em;" href="<?= Yii::app()->createUrl('van-ban', array('noi-dung' => $data->alias)) ?>"><i class="fa fa-angle-double-right"></i> 
        <?= $data->title; ?>
    </a>
    <i style="font-size: .9em;">(<?= Yii::app()->dateFormatter->format('dd/MM/y', strtotime($data->datecreate)) ?>)</i>
</li>
