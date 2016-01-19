<div class="row">
    <?php
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => '<i class="fa fa-home"></i> Home', 'url' => array('site/index')),
            array('name' => 'Error',),
        ),
    ));
    ?>
</div>

<div class="alert alert-danger">
    <h2>Error <?php echo $code; ?></h2>
    <div class="error">
        <?php echo CHtml::encode($message); ?>
    </div>
</div>
