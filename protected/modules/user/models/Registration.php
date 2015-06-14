<?php

class Registration extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public $confirm_password;
    public $terms;

    public function tableName() {
        return 'users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id,email,password,confirm_password,first_name,last_name', 'required'),
            array('terms','required','message'=>'Please accept the terms and conditions.'),
            array('phone','numerical'),
            array('confirm_password', 'compare', 'compareAttribute'=>'password'),
            array('email', 'email'),
            array('password', 'length','min'=> 6,'max'=> 100),
            array('email', 'authenticate'),
            array('first_name, last_name', 'length', 'max' => 50),
            array('id, package_id, role_id, created_by, modified_by, activation_key', 'length', 'max' => 36),
            array('password, phone, mobile, email, website, skype, referral_code', 'length', 'max' => 100),
            array('first_name, last_name', 'length', 'max' => 50),
            array('facebook_url, title_position, twitter_url, pinterest_url, user_image', 'length', 'max' => 256),
            array('created_date, modified_date, next_payment_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, password, first_name, last_name, phone, mobile, email, website, skype, facebook_url, twitter_url, pinterest_url, package_id, role_id, status, deleted, payment_status, user_image, created_date, created_by, modified_date, modified_by, referral_code, is_admin, next_payment_date, activation_key', 'safe', 'on' => 'search'),
        );
    }

   protected function beforeValidate() {
        $front_user_id = frontUserId();
        if ($this->isNewRecord) {
            // set the create date, last updated date and the user doing the creating
            if (create_guid()) {
                $this->id = create_guid();
                $this->created_date = date("Y-m-d H:i:s");
                if (!empty($front_user_id)) {
                    $this->created_by = $front_user_id;
                    $this->modified_by = $front_user_id;
                } else {
                    $this->created_by = Yii::app()->user->id;
                    $this->modified_by = Yii::app()->user->id;
                }
                $this->deleted = 0;
                $this->status = 0;
                $this->modified_date = date("Y-m-d H:i:s");
            }
        } else {
            //not a new record, so just set the last updated time and last updated user id
            $this->modified_date = date("Y-m-d H:i:s");
            if (!empty($front_user_id)) {
                $this->modified_by = $front_user_id;
            } else {
                $this->modified_by = Yii::app()->user->id;
            }
        }
        return parent::beforeValidate();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'password' => 'Password',
            'confirm_password' => 'Confirm Password',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone' => 'Phone',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'website' => 'Website',
            'skype' => 'Skype',
            'facebook_url' => 'Facebook Url',
            'twitter_url' => 'Twitter Url',
            'pinterest_url' => 'Pinterest Url',
            'package_id' => 'Package',
            'role_id' => 'Role',
            'status' => 'Status',
            'deleted' => 'Deleted',
            'payment_status' => 'Payment Status',
            'user_image' => 'User Image',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'modified_date' => 'Modified Date',
            'modified_by' => 'Modified By',
            'referral_code' => 'Referral Code',
            'is_admin' => 'Is Admin',
            'next_payment_date' => 'Next Payment Date',
            'activation_key' => 'Activation Key',
        );
    }


    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Users the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    
    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute, $params) {
            // $username = Users::model()->findByAttributes(array('username' => $this->username));
            $email = Users::model()->findByAttributes(array('email' => $this->email));
                //pre($user,true);
            // if ($username) {
            //         $this->addError("username", "Username has been taken.");
            // }
              if ($email) {
                    $this->addError("email", "Email already in registered.");
            }
    }

}
