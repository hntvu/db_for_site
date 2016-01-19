<div class="text-info"></div>
<?php

$this->widget('zii.widgets.CMenu', array(
    'firstItemCssClass' => 'first',
    'lastItemCssClass' => 'last',
    'htmlOptions' => array('class' => 'breadcrumb alert-info'),
    'items' => array(
        array(
            'label' => Rights::t('core', 'Quyền truy cập (assignment)'),
            'url' => array('assignment/view'),
            'itemOptions' => array('class' => 'item-assignments'),
        ),
        array(
            'label' => Rights::t('core', 'Phân quyền (Permissions)'),
            'url' => array('authItem/permissions'),
            'itemOptions' => array('class' => 'item-permissions'),
        ),
        array(
            'label' => Rights::t('core', 'Vai trò (Role)'),
            'url' => array('authItem/roles'),
            'itemOptions' => array('class' => 'item-roles'),
        ),
        array(
            'label' => Rights::t('core', 'Chỉ định (Task)'),
            'url' => array('authItem/tasks'),
            'itemOptions' => array('class' => 'item-tasks'),
        ),
        array(
            'label' => Rights::t('core', 'Thao tác (Operation)'),
            'url' => array('authItem/operations'),
            'itemOptions' => array('class' => 'item-operations'),
        ),
    )
));
