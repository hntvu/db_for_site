<?php

class MenuCates extends CApplicationComponent {

    private static $menuTree = array();

    public static function getMenuTree() {
        if (empty(self::$menuTree)) {
            $rows = Menu::model()->findAll('parent = 0 AND status = 1 ORDER BY id ASC');
            foreach ($rows as $item) {
                self::$menuTree[] = self::getMenuItems($item);
            }
        }
        return self::$menuTree;
    }

    private static function getMenuItems($modelRow) {

        if (!$modelRow)
            return;

        if (isset($modelRow->Childs)) {
            $chump = self::getMenuItems($modelRow->Childs);
            if ($modelRow->controller == "") {
                $tempControll = "danh-muc";
            } else {
                $tempControll = $modelRow->controller;
            }
            if ($chump != null)
                $res = array(
                    'label' => $modelRow->title,
                    'items' => $chump,
                    'url' => Yii::app()->createUrl($modelRow->controller),
                        //'itemOptions' => array('class' => 'dropdown'),
                        //'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown',),
                );
            else
                $res = array(
                    'label' => $modelRow->title,
                    'url' => Yii::app()->createUrl("danh-muc" . "/" . $tempControll . "/" . $modelRow->alias),
                );
            return $res;
        } else {
            if (is_array($modelRow)) {
                $arr = array();
                foreach ($modelRow as $leaves) {
                    $arr[] = self::getMenuItems($leaves);
                }
                return $arr;
            } else {
                return array(
                    'label' => ($modelRow->title),
                    'url' => Yii::app()->createUrl($modelRow->controller),
                );
            }
        }
    }

}
