<?php if ($model != null): ?>
    <ul class="docSlider">
        <?php foreach ($model as $value): ?>
            <li><a href="<?= Yii::app()->createUrl('van-ban', array('noi-dung' => $value->alias)) ?>"><i class="fa fa-file-word-o"></i> <?= $value->title ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <li><a href="#" class="text-danger">Dữ liệu đang cập nhật!</a></li>
    <?php endif; ?>


