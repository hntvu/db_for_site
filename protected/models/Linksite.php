<?php

/**
 * This is the model class for table "linksite".
 *
 * The followings are the available columns in table 'linksite':
 * @property integer $id
 * @property string $title
 * @property string $link
 * @property string $opgroup
 */
class Linksite extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'linksite';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            /* TRIM DATA */
            array('title, link, opgroup', 'filter', 'filter' => 'trim'),
            array('title, link, opgroup', 'filter', 'filter' => array($object = new CHtmlPurifier(), 'purify')),
            array('link', 'match', 'pattern' => '/^[a-z._]+$/', 'message' => 'Sai định dạng, Địa chỉ trang phải: <br/>  - Không chứa kí tự đặc biệt <br/>- Không thêm http:// <br/> - Không khoảng trắng và không được viết HOA'),
            array('title, link, opgroup', 'required'),
            array('title, opgroup', 'length', 'max' => 128),
            array('link', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, link, opgroup', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Tên website',
            'link' => 'Địa chỉ trang',
            'opgroup' => 'Tên nhóm',
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
        $criteria->compare('title', $this->title, true);
        $criteria->compare('link', $this->link, true);
        $criteria->compare('opgroup', $this->opgroup, true);

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
     * @return Linksite the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getLinkSite() {
        $opt = CHtml::listData($this->findAll(), 'link', 'title', 'opgroup');
        return $opt;
    }

}
