<?php

class ForgetPasswordForm extends CFormModel {

    public $email;
    public $verifyCode;

    /**
     * Declares the validation rules.
     * The rules state that email and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // email and password are required
            array('email', 'required'),
            array('email', 'email'),
            array('verifyCode', 'CaptchaExtendedValidator', 'allowEmpty' => !CCaptcha::checkRequirements()),
                // rememberMe needs to be a boolean
                // password needs to be authenticated
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'email' => 'Email',
            'verifyCode'=>'Verification Code',
        );
    }

    public function forgetPassword() {
        if ($this->email != '') {
            $check = User::model()->findByAttributes(array('email' => $this->email));
            if ($check != '') {
                $password = substr($check->password, 0, 10);
                $check->password = $check->hashPassword($password);
                $check->saveAttributes(array('password'));
                $mail = new YiiMailMessage;
                $mail->subject = 'Hệ thống reset mật khẩu ' . Yii::app()->getBaseUrl(true);
                $body = '<p>Mật khẩu mới của bạn là: <strong>' . $password . '</strong></p>
                        Click <a taget="_blank" href="' . Yii::app()->getBaseUrl(true) . '/admin">vào đây</a> để đi đến website và thay đổi lại mật khẩu';
                $mail->setBody($body, 'text/html');
                $mail->addTo($this->email);
                $mail->from = Yii::app()->params['adminEmail'];
                Yii::app()->mail->send($mail);
                return true;
            } else {
                return false;
            }
        }
    }

}
