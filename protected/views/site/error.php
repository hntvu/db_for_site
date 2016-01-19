<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = Yii::app()->name . ' - Error';
?>

<div class="error-code"><?php echo $code; ?><i class="fa fa-exclamation"></i></div>
<h3 class="font-bold" style="color: #c0392b;"><?php echo CHtml::encode($message); ?><br><br></h3>

<div class="error-desc">
    <?php if ($code == '404'): ?>
        Xin lỗi, trang mà bạn đang tìm kiếm không tìm thấy hoặc không tồn tại<br>
        Hãy thử làm mới trang hoặc nhấp vào nút dưới đây để quay lại trang chủ
    <?php elseif ($code == '500'): ?>
        Server bị lỗi vui lòng truy cập lại sau
    <?php elseif ($code == '403'): ?>
        Vui lòng liên hệ admin
    <?php else: ?>
        Vui lòng liên hệ admin
    <?php endif; ?>
    <br><br>
    <?php echo CHtml::link('Go to Home <span class="glyphicon glyphicon-home">', '' . Yii::app()->request->baseUrl . '/', array('class' => 'btn btn-danger')) ?>

</div>