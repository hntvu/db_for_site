<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
?>
<img id="profile-img" class="profile-img-card" src="<?= Yii::app()->request->baseUrl ?>/uploads/files/more/qh.png" />
<p id="profile-name" class="profile-name-card text-primary">Trung tâm tin học Sa Đéc</p>
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>
    <div class="row">
        <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'placeholder' => 'Tên đăng nhập')); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>
    <div class="row password">
        <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => 'Mật khẩu')); ?>
        <i class="glyphicon glyphicon-eye-open"></i>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="row rememberMe">
        <?php echo $form->checkBox($model, 'rememberMe', array('class' => 'col-lg-1 col-xs-1')); ?>
        <?php echo $form->label($model, 'rememberMe', array('class' => 'col-lg-11 col-xs-11')); ?>
        <?php echo $form->error($model, 'rememberMe'); ?>
        <?php
        if (Yii::app()->user->getState('loginFailed')) {
            echo "Bạn nhập sai " . Yii::app()->user->getState('loginFailed') . " lần";
        }
        ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-lg btn-primary btn-block btn-signin')); ?>
        <?php echo CHtml::link('Quên mật khẩu', '' . Yii::app()->createUrl('phuc-hoi-mat-khau') . '', array('class' => 'pull-right', 'style' => 'font-size: .9em;')); ?>
        <?php echo CHtml::link('Về trang chủ', '' . Yii::app()->request->baseUrl . '', array('class' => 'pull-left', 'style' => 'font-size: .9em;')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
