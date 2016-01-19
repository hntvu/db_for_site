<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property integer $idmenu
 * @property string $title
 * @property string $alias
 * @property string $content
 * @property string $image
 * @property string $seodescription
 * @property string $seokeyword
 * @property string $source
 * @property integer $views
 * @property integer $usercreate
 * @property string $datecreate
 * @property string $lastupdate
 * @property string $summary
 */
class News extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'news';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idmenu, title, alias, content, image, source, usercreate, summary', 'required'),
            //Pattern
            array('alias', 'match', 'pattern' => '/^[a-z0-9-]+$/', 'message' => 'SEO URL phải đúng định dạng: aaa-bbb-ccc-ddd'),
            /* TRIM DATA */
            array('title, alias, summary, seokeyword, seodescription, source', 'filter', 'filter' => 'trim'),
            array('title, alias, summary, seokeyword, seodescription, source', 'filter', 'filter' => array($object = new CHtmlPurifier(), 'purify')),
            array('idmenu, views, usercreate', 'numerical', 'integerOnly' => true),
            array('title, alias', 'length', 'max' => 255),
            array('image', 'length', 'max' => 64),
            array('source', 'length', 'max' => 50),
            array('seodescription, seokeyword, datecreate, lastupdate', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, idmenu, title, alias, content, image, seodescription, seokeyword, source, views, usercreate, datecreate, lastupdate, summary', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'newsUser' => array(self::BELONGS_TO, 'User', 'usercreate'),
            'menuNews' => array(self::BELONGS_TO, 'Menu', 'idmenu'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'idmenu' => 'Danh mục',
            'title' => 'Tiêu đề',
            'alias' => 'SEO URL',
            'content' => 'Nội dung',
            'image' => 'Hình đại diện',
            'seodescription' => 'Mô tả SEO',
            'seokeyword' => 'Từ khóa SEO',
            'source' => 'Nguồn tin',
            'views' => 'Lượt xem',
            'usercreate' => 'Người tạo',
            'datecreate' => 'Ngày tạo',
            'lastupdate' => 'Ngày cập nhật',
            'summary' => 'Mô tả',
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
        $criteria->compare('idmenu', $this->idmenu);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('seodescription', $this->seodescription, true);
        $criteria->compare('seokeyword', $this->seokeyword, true);
        $criteria->compare('source', $this->source, true);
        $criteria->compare('views', $this->views);
        $criteria->compare('usercreate', $this->usercreate);
        $criteria->compare('datecreate', $this->datecreate, true);
        $criteria->compare('lastupdate', $this->lastupdate, true);
        $criteria->compare('summary', $this->summary, true);
        if (Yii::app()->user->getState('roler') != 'admin') {
            $criteria->addCondition('usercreate=' . Yii::app()->user->id);
        }

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
     * @return News the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function searchEmployees($data, $row) {
        $connection = Yii::app()->db;
        $sql = "SELECT user.firstname, user.id FROM user WHERE user.id ='$data->usercreate'";
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        $ans = array();
        foreach ($rows as $data) {
            $ans = $data['firstname'];
        }
        return $ans;
    }

}
