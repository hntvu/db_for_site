<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property integer $role
 * @property string $username
 * @property string $password
 * @property string $fullname
 * @property string $firstname
 * @property string $lastname
 * @property string $avatar
 * @property integer $phone
 * @property string $email
 * @property string $datecreate
 * @property string $lastupdate
 * @property string $note
 */
class User extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            /* REQUIRED DATA */
            array('role, username, password, fullname, email', 'required'),
            /* TRIM DATA */
            array('username, firstname, lastname, fullname, email, phone, note', 'filter', 'filter' => 'trim'),
            array('username, firstname, lastname, fullname, email, phone, note', 'filter', 'filter' => array($object = new CHtmlPurifier(), 'purify')),
            /* VALIDATE NUMBER */
            array('phone', 'numerical', 'integerOnly' => true, 'message' => 'Số điện thoại không đúng định dạng'),
            array('email', 'email', 'message' => 'Email không đúng định dạng'),
            /* VALIDATE LENGHT */
            array('username', 'length', 'max' => 20),
            array('password', 'length', 'max' => 128),
            array('fullname', 'length', 'max' => 30),
            array('firstname, lastname', 'length', 'max' => 10),
            array('avatar, email', 'length', 'max' => 50),
            /** PATTERN VALIDATION * */
            array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/', 'message' => 'Tên đăng nhập phải viết thường hoặc viết HOA, không dấu, không khoảng trắng'),
            /** CHECK EXIST VALIDATION * */
            array('username', 'uniqueUserName'),
            /* IMAGE VALIDATION */
            array('avatar', 'EImageValidator', 'types' => "gif, jpg, png, bmp", 'allowEmpty' => 'true'),
            array('avatar', 'EImageValidator', 'min_size' => 1, 'max_size' => 50, 'sizeError' => 'Dung lượng hình quá lớn, phải nằm trong khoảng 1-50 Kilobytes.', 'allowEmpty' => 'true'),
            array('datecreate, lastupdate, note', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, role, username, password, fullname, firstname, lastname, avatar, phone, email, datecreate, lastupdate, note', 'safe', 'on' => 'search'),
        );
    }

    //hashed password
    //@return hashed value
    public function hashPassword($phrase, $salt = NULL) {
        $key = 'Gf;B&yXL|beJUf-K*PPiU{wf|@9K9j5?d+YW}?VAZOS%e2c -:11ii<}ZM?PO!96';
        if ($salt == "") {
            $salt = substr(hash('sha512', $key), 0, 10);
        }
        return hash('sha512', $salt . $key . $phrase);
    }

    //@return boolean validate user
    public function validatePassword($password) {
        return $this->hashPassword($password) === $this->password;
    }

    public function uniqueUserName($attribute, $params) {
        if ($user = User::model()->exists('username=:xxx', array(':xxx' => $this->username)))
            $this->addError($attribute, 'Tên đăng nhập đã tồn tại');
    }

    public function showphoto_from_database() {
        if ($this->avatar != '') {
            $url = Yii::app()->baseUrl . "/uploads/files/avatar/" . $this->avatar;
            return CHtml::image($url, 'avatar', array('width' => '100%', 'height' => '100%', 'class' => 'img-circle img-responsive'));
        } else {
            $url = Yii::app()->baseUrl . "/uploads/files/avatar/NoImage.png";
            return CHtml::image($url, 'No Image', array('width' => '100%', 'height' => '100%', 'class' => 'img-circle img-responsive'));
        }
    }

    public function getOpts() {
        $opts = CHtml::listData($this->findAll(), 'id', 'firstname');
        return $opts;
    }

    public function getRoles() {
        $opts = CHtml::listData(Role::model()->findAll(), 'id', 'description');
        return $opts;
    }

    public function getRolesADMN($data, $row) {
        $connection = Yii::app()->db;
        $sql = "SELECT role.description FROM role WHERE role.id ='$data->role'";
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        $ans = array();
        foreach ($rows as $data) {
            $ans = $data['description'];
        }
        return $ans;
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'roleUser' => array(self::BELONGS_TO, 'Role', 'role'),
            'aliasUser' => array(self::HAS_MANY, 'News', 'id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'role' => 'Quyền',
            'username' => 'Tên đăng nhập',
            'password' => 'Mật khẩu',
            'fullname' => 'Tên đầy đủ',
            'firstname' => 'Tên',
            'lastname' => 'Họ',
            'avatar' => 'Avatar',
            'phone' => 'Số điện thoại',
            'email' => 'Email',
            'datecreate' => 'Ngày tạo',
            'lastupdate' => 'Ngày cập nhật',
            'note' => 'Ghi chú',
            'hvt' => 'Họ và Tên',
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
        $sort = new CSort();
        $sort->attributes = array(
            'title' => array(
                'asc' => "title",
                'desc' => "title desc",
            ),
            '*',
        );
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('role', $this->role);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('fullname', $this->fullname, true);
        $criteria->compare('firstname', $this->firstname, true);
        $criteria->compare('lastname', $this->lastname, true);
        $criteria->compare('avatar', $this->avatar, true);
        $criteria->compare('phone', $this->phone);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('datecreate', $this->datecreate, true);
        $criteria->compare('lastupdate', $this->lastupdate, true);
        $criteria->compare('note', $this->note, true);

        return new CActiveDataProvider($this, array(
            'pagination' => array(
                'pageSize' => 4,
            ),
            'criteria' => $criteria,
            'sort' => $sort,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
