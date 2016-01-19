<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    private $_id;

    public function getId() {
        return $this->_id;
    }

    public function authenticate() {
        $user = User::model()->find('LOWER(username)=?', array($this->username));
        if ($user == NULL) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {
            if (!$user->validatePassword($this->password)) {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } else {
                $this->_id = $user->id;
                $auth = Yii::app()->authManager;
                if (!$auth->isAssigned($user->roleUser->name, $this->_id)) {
                    if ($auth->assign($user->roleUser->name, $this->_id)) {
                        Yii::app()->authManager->save();
                    }
                }
                //$this->username = $user->username;
                $this->setState('firstname', $user->firstname);
                $this->setState('fullname', $user->fullname);
                $this->setState('avatar', $user->avatar);
                $this->setState('roles', $user->roleUser->description);
                $this->setState('roler', $user->roleUser->name);
                $_SESSION['ckfinder'] = $user->id;
                if ($user->id == '1') {
                    $_SESSION['CKFinder_UserRole'] = $user->id;
                }

                $this->errorCode = self::ERROR_NONE;
            }
        }
        return !$this->errorCode;
    }

}
