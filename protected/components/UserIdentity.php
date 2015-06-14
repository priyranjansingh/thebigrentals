<?php
session_start();
ob_start();
/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    private $_id;
    
    public $front_user_id;
    
    const ERROR_EMAIL_INVALID = 3;
    const ERROR_STATUS_NOTACTIV = 4;
    const ERROR_STATUS_BAN = 5;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        if (strpos($this->username, "@")) {
            $user = Users::model()->findByAttributes(array('email' => $this->username));
        } else {
            $user = Users::model()->findByAttributes(array('username' => $this->username));
        }
        if ($user === null)
            if (strpos($this->username, "@")) {
                $this->errorCode = self::ERROR_EMAIL_INVALID;
            } else {
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            } else if (Yii::app()->getModule('admin')->encrypting($this->password) !== $user->password)
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else if ($user->status == 0 && Yii::app()->getModule('admin')->loginNotActiv == false)
            $this->errorCode = self::ERROR_STATUS_NOTACTIV;
        else if ($user->status == -1)
            $this->errorCode = self::ERROR_STATUS_BAN;
        else {
            die("i am here");
            //$this->_id = $user->id;
//            $this->username = $user->username;
              $this->errorCode = self::ERROR_NONE;
//            $role = $user->role_id;
//            $role_model = Roles::model()->findByPk($role);
//              $this->setState('front_user_id', $user->id);
              $_SESSION['user_id'] = $user->id;
        }
        return !$this->errorCode;
    }

    /**
     * @return integer the ID of the user record
     */
    public function getId() {
        return $this->_id;
    }

}