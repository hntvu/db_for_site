<ul class="sliderImages text-center">
    <?php foreach ($model as $models): ?>
        <li><img src="<?= Yii::app()->baseUrl ?>/uploads/source/slideshow/<?= $models->image ?>" title="<?= $models->caption ?>"/></li>
    <?php endforeach; ?>
</ul>