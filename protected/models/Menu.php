<?php

/**
 * This is the model class for table "menu".
 *
 * The followings are the available columns in table 'menu':
 * @property integer $id
 * @property integer $parent
 * @property string $title
 * @property string $alias
 * @property string $controller
 * @property string $url
 * @property string $icon
 * @property integer $status
 */
class Menu extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'menu';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            /* TRIM DATA */
            array('title, icon', 'filter', 'filter' => 'trim'),
            array('title, icon', 'filter', 'filter' => array($object = new CHtmlPurifier(), 'purify')),
            array('parent, title, alias, status', 'required'),
            array('parent, status', 'numerical', 'integerOnly' => true),
            array('title, alias', 'length', 'max' => 50),
            array('controller, url, icon', 'length', 'max' => 30),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, parent, title, alias, controller, url, icon, status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Childs' => array(self::HAS_MANY, 'menu', 'parent'),
            'Menu' => array(self::BELONGS_TO, 'menu', 'parent'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'parent' => 'Danh mục',
            'title' => 'Tiêu đề',
            'alias' => 'SEO URL',
            'controller' => 'Controller',
            'url' => 'Url',
            'icon' => 'Icon',
            'status' => 'Trạng thái',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('parent', $this->parent);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('controller', $this->controller, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('icon', $this->icon, true);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'pagination' => array(
                'pageSize' => Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']),
            ),
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Menu the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getListParents() {
        $dataCate = array();
        $dataCate[0] = 'Danh mục cha';
        $listCates = Menu::model()->findAllBySql('SELECT menu.id, menu.title FROM menu WHERE menu.parent = 0');
        foreach ($listCates as $listCateMore) {
            $dataCate[$listCateMore->id] = $listCateMore->title;
            /*
              $listCates2 = Menu::model()->findAllBySql('SELECT menu.id, menu.title FROM menu WHERE menu.parent = :xxx', array(':xxx' => $listCateMore->id));
              foreach ($listCates2 as $listCateMore2) {
              $dataCate[$listCateMore2->id] = '|--- ' . $listCateMore2->title;
              }
             */
        }
        return $dataCate;
    }

    public function getListParentsFull() {
        $dataCate = array();
        $listCates = Menu::model()->findAllBySql('SELECT menu.id, menu.title FROM menu WHERE menu.parent = 0');
        foreach ($listCates as $listCateMore) {
            $dataCate[$listCateMore->id] = "<li><a style='color:#FF6600;' href='" . Yii::app()->baseUrl . "/admin/menu/update/id/" . $listCateMore->id . "'><i class='fa fa-caret-right'></i> " . $listCateMore->title . "</a></li>";
            $listCates2 = Menu::model()->findAllBySql('SELECT menu.id, menu.title FROM menu WHERE menu.parent = :xxx', array(':xxx' => $listCateMore->id));
            foreach ($listCates2 as $listCateMore2) {
                $dataCate[$listCateMore2->id] = "<li><a style='color:#0099FF;' href='" . Yii::app()->baseUrl . "/admin/menu/update/id/" . $listCateMore2->id . "'>|-----<i class='fa fa-angle-double-right'></i> " . $listCateMore2->title . "</a></li>";
            }
        }
        return $dataCate;
    }

    public function getParentMenu() {
        $dataParent = CHtml::listData($this->findAll('parent = 0'), 'id', 'title');
        return $dataParent;
    }

    public function getChildsMenu() {
        $dataParent = CHtml::listData($this->findAll('parent != 0'), 'id', 'title');
        return $dataParent;
    }

}
