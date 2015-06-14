<?php

ob_start();

/**
 * ChangePassword class.
 * ChangePassword is the data structure for keeping
 * username of a particular user.
 */
class ChangeUserPassword extends CFormModel {

    public $password;
    public $confirm_password;
    public $current_password;
    

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            array('current_password,password,confirm_password', 'required'),
            array('confirm_password', 'compare', 'compareAttribute'=>'password'),
            array('password', 'length', 'max' => 128, 'min' => 6, 'message' => "Incorrect password (minimal length 6 symbols)."),
            array('current_password', 'authenticate'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'current_password' => "Current Password",
            'password' => "Password",
            'confirm_password' => "Confirm Password",
        );
    }
    
    
    public function authenticate($attribute, $params) {
        $id = frontUserId();
        if (Users::model()->findByPk($id)->password != encryption($this->current_password)) {
            $this->addError($attribute, "Current Password is incorrect.");
        }
        // if (!$this->hasErrors()) {  // we only want to authenticate when no input errors
        //         //$id = Yii::app()->user->id;
        //         //pre($id,true);BaseModel::getAll
        //         $user = BaseModel::updateModelByPk('Users',array('password' => AdminModule::encrypting($this->current_password)),Yii::app()->user->id);
        //     if ($user === null) {
        //             $this->addError("current_password", "Incorrect Password.");
        //     }
        // }
    }

   

}
