<?php
$this->breadcrumbs = array(
    'Rights' => Rights::getBaseUrl(),
    Rights::t('core', 'Create :type', array(':type' => Rights::getAuthItemTypeName($_GET['type']))),
);
?>

<div class="createAuthItem">

    <h3 class="text-info">
        <?php
        echo Rights::t('core', 'Tạo :type', array(
            ':type' => Rights::getAuthItemTypeName($_GET['type']),
        ));
        ?>
    </h3>
    <div class="well">
        <?php $this->renderPartial('_form', array('model' => $formModel)); ?>
    </div>
</div>