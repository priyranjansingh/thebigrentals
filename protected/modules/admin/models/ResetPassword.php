<?php

ob_start();

/**
 * ChangePassword class.
 * ChangePassword is the data structure for keeping
 * username of a particular user.
 */
class ResetPassword extends CFormModel {

    public $password;
    public $confirm_password;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            array('password,confirm_password', 'required'),
            array('confirm_password', 'compare', 'compareAttribute'=>'password'),
            array('password', 'length', 'max' => 128, 'min' => 6, 'message' => AdminModule::t("Incorrect password (minimal length 6 symbols).")),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'password' => "Password",
            'confirm_password' => "Confirm Password",
        );
    }

   

}
