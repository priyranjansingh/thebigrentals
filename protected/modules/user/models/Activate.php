<?php


class Activate extends BaseModel {

   

    public function tableName() {
        return 'users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('id', 'required'),
            array('about_me, created_date, modified_date, next_payment_date', 'safe'),
            array('id, username, password, first_name, last_name,addressLine1, addressLine2,city,state,country,zip, nick_name, phone, mobile, email, website, skype, facebook_url, title_position, twitter_url, pinterest_url, about_me, package_id, role_id, status, deleted, payment_status, user_image, created_date, created_by, modified_date, modified_by, referral_code, is_admin, next_payment_date, activation_key', 'safe', 'on' => 'search'),
        );
    }

    

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'confirm_password' => 'Confirm Password',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'nick_name' => 'Nick Name',
            'addressLine1' => 'Address Line 1',
            'addressLine2' => 'Address Line 2',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'zip' => 'zip',
            'phone' => 'Phone',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'website' => 'Website',
            'skype' => 'Skype',
            'facebook_url' => 'Facebook Url',
            'title_position' => 'Title Position',
            'twitter_url' => 'Twitter Url',
            'pinterest_url' => 'Pinterest Url',
            'about_me' => 'About Me',
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('nick_name', $this->nick_name, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('mobile', $this->mobile, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('website', $this->website, true);
        $criteria->compare('skype', $this->skype, true);
        $criteria->compare('facebook_url', $this->facebook_url, true);
        $criteria->compare('title_position', $this->title_position, true);
        $criteria->compare('twitter_url', $this->twitter_url, true);
        $criteria->compare('pinterest_url', $this->pinterest_url, true);
        $criteria->compare('about_me', $this->about_me, true);
        $criteria->compare('package_id', $this->package_id, true);
        $criteria->compare('role_id', $this->role_id, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('deleted', $this->deleted);
        $criteria->compare('payment_status', $this->payment_status);
        $criteria->compare('user_image', $this->user_image, true);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('created_by', $this->created_by, true);
        $criteria->compare('modified_date', $this->modified_date, true);
        $criteria->compare('modified_by', $this->modified_by, true);
        $criteria->compare('referral_code', $this->referral_code, true);
        $criteria->compare('is_admin', $this->is_admin);
        $criteria->compare('next_payment_date', $this->next_payment_date, true);
        $criteria->compare('activation_key', $this->activation_key, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
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

}
