<?php

ob_start();

/**
 * ChangePassword class.
 * ChangePassword is the data structure for keeping
 * username of a particular user.
 */
class ChangePassword extends CFormModel {

    public $username;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            array('username', 'required'),
            array('username', 'authenticate'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'username' => "Enter Your Email",
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute, $params) {
        if (!$this->hasErrors()) {  // we only want to authenticate when no input errors
            if (strpos($this->username, "@")) {
                $user = Users::model()->findByAttributes(array('email' => $this->username));
            } 
            if ($user === null) {
                if (strpos($this->username, "@")) {
                    $this->addError("username", "Email is incorrect.");
                }
            }
        }
    }

}
