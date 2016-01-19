<div class="row">
    <?php
    /* @var $this MenuController */
    /* @var $dataProvider CActiveDataProvider */
    $this->widget('application.components.BreadCrumb', array(
        'crumbs' => array(
            array('name' => '<i class="fa fa-home"></i> Trang chủ', 'url' => array('site/index')),
            array('name' => 'Xem danh mục',),
        ),
    ));
    ?>   
</div>

<div class="row">
    <div class="col-lg-12">
        <h6 class="text-info lable-admin">Xem danh mục</h6>  
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="">
            <ul class="treeview">
                <?php
                $listCate = $model->getListParentsFull();
                foreach ($listCate as $listCates) {
                    echo $listCates;
                }
                ?>
            </ul>

        </div>
    </div>
</div>