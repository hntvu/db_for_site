<?php

$this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array(
            'label' => '<h5>Thành viên <i class="fa fa-angle-double-down pull-right"></i></h5>',
            'url' => '',
            'visible' => Yii::app()->user->checkAccess('admin'),
            'linkOptions' => array('class' => 'admin-bar'),
            'items' => array(
                array('label' => 'Tạo thành viên', 'url' => '' . Yii::app()->request->baseUrl . '/admin/user/create',),
                array('label' => 'Quản lý thành viên', 'url' => '' . Yii::app()->request->baseUrl . '/admin/user/admin',),
            )
        ),
        array(
            'label' => '<h5>Danh mục <i class="fa fa-angle-double-down pull-right"></i></h5>',
            'url' => '',
            'visible' => Yii::app()->user->checkAccess('admin'),
            'linkOptions' => array('class' => 'admin-bar'),
            'items' => array(
                array('label' => 'Tạo danh mục', 'url' => '' . Yii::app()->request->baseUrl . '/admin/menu/create',),
                array('label' => 'Sơ đồ danh mục', 'url' => '' . Yii::app()->request->baseUrl . '/admin/menu/index',),
                array('label' => 'Xóa danh mục', 'url' => '' . Yii::app()->request->baseUrl . '/admin/menu/admin',),
            )
        ),
        array(
            'label' => '<h5>Tin tức <i class="fa fa-angle-double-down pull-right"></i></h5>',
            'url' => '',
            'linkOptions' => array('class' => 'admin-bar'),
            'items' => array(
                array('label' => 'Đăng tin', 'url' => '' . Yii::app()->request->baseUrl . '/admin/news/create',),
                array('label' => 'Danh sách tin', 'url' => '' . Yii::app()->request->baseUrl . '/admin/news/index',),
                array('visible' => Yii::app()->user->checkAccess('admin'), 'label' => 'Quản lý tin', 'url' => '' . Yii::app()->request->baseUrl . '/admin/news/admin',),
            )
        ),
        array(
            'label' => '<h5>Văn bản <i class="fa fa-angle-double-down pull-right"></i></h5>',
            'url' => '',
            'linkOptions' => array('class' => 'admin-bar'),
            'items' => array(
                array('label' => 'Tạo văn bản', 'url' => '' . Yii::app()->request->baseUrl . '/admin/document/create',),
                array('label' => 'Danh sách văn bản', 'url' => '' . Yii::app()->request->baseUrl . '/admin/document/index',),
                array('visible' => Yii::app()->user->checkAccess('admin'), 'label' => 'Quản lý văn bản', 'url' => '' . Yii::app()->request->baseUrl . '/admin/document/admin',),
            )
        ),
        array(
            'label' => '<h5>Liên kết trang <i class="fa fa-angle-double-down pull-right"></i></h5>',
            'url' => '',
            'linkOptions' => array('class' => 'admin-bar'),
            'items' => array(
                array('label' => 'Tạo liên kết', 'url' => '' . Yii::app()->request->baseUrl . '/admin/linksite/create',),
                array('label' => 'Danh sách trang', 'url' => '' . Yii::app()->request->baseUrl . '/admin/linksite/index',),
                array('visible' => Yii::app()->user->checkAccess('admin'), 'label' => 'Quản lý trang', 'url' => '' . Yii::app()->request->baseUrl . '/admin/linksite/admin',),
            )
        ),
        array(
            'label' => '<h5>Slideshow <i class="fa fa-angle-double-down pull-right"></i></h5>',
            'url' => '',
            'linkOptions' => array('class' => 'admin-bar'),
            'items' => array(
                array('label' => 'Tạo thêm Slide', 'url' => '' . Yii::app()->request->baseUrl . '/admin/slideshow/create',),
                array('label' => 'Danh sách Slide', 'url' => '' . Yii::app()->request->baseUrl . '/admin/slideshow/index',),
                array('visible' => Yii::app()->user->checkAccess('admin'), 'label' => 'Xóa Slide', 'url' => '' . Yii::app()->request->baseUrl . '/admin/slideshow/admin',),
            )
        ),
        array(
            'label' => '<h5>Phân quyền</h5>',
            'url' => '' . Yii::app()->request->baseUrl . '/rights',
            'visible' => Yii::app()->user->checkAccess('admin'),
            'linkOptions' => array('class' => 'admin-bar'),
        ),
    ),
    'encodeLabel' => false,
));
