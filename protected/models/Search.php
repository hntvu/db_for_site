<?php

//Phần Model
class Search extends CFormModel {

    public $idmenu;
    public $title;

    public function rules() {
        return array(
            /* TRIM DATA */
            array('title', 'filter', 'filter' => 'trim'),
            array('title', 'filter', 'filter' => array($object = new CHtmlPurifier(), 'purify')),
            array('title, idmenu', 'safe'),
        );
    }

    public function searchCates() {
        $cdb = new CDbCriteria();
        $cdb->addSearchCondition('title', $this->title, true);
        return new CActiveDataProvider('News', array(
            'criteria' => $cdb,
            'pagination' => array(
                'pageSize' => 2
            )
        ));
    }

    public static function highlight($text, $words, $color = '#FF6600', $color2 = '#fff', $case = '1') {
        $words = trim($words);
        $wordsArray = explode(' ', $words);
        foreach ($wordsArray as $word) {
            if (strlen(trim($word)) != 0)
                if ($case)
                    $text = eregi_replace($word, '<font style="background:' . $color . ';color:' . $color2 . '";>' . $word . '</font>', $text);
        }
        return $text;
    }

}
