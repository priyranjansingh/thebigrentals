<?php

ob_start();

/**
 * ChangePassword class.
 * ChangePassword is the data structure for keeping
 * username of a particular user.
 */
class CreditCardForm extends CFormModel {
    public $ccTitle;
    public $ccFname;
    public $ccLname;
    public $ccNumber;
    public $expMonth;
    public $expYear;
    public $cvv;
    public $token;
    public $addressLine1;
    public $city;
    public $state;
    public $country;
    public $zip;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            array('ccTitle,ccFname,ccLname,addressLine1,city,state,country,zip,ccNumber, expMonth, expYear, cvv, token', 'required'),
//            array('ccName', 'string'),
            array('ccFname,ccLname,addressLine1,city,state,country' ,'length','max' => 100),
            array('ccNumber, expMonth, expYear, cvv, zip', 'numerical'),
            array('ccNumber','length','max' => 18,'min' => 16),
            array('expMonth','length','max' => 2,'min' => 2),
            array('expYear','length','min' => 4),
            array('zip','length','min' => 5, 'max' => 6),
            array('cvv','length','min' => 3),
            array('expYear,cvv','length','max' => 4),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'ccTitle' => 'Title',
            'ccFname' => 'First Name',
            'ccLname' => 'Last Name',
            'addressLine1' => 'Address Line 1',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'ccNumber' => "Credit Card Number",
            'expMonth' => "Expiry Month",
            'expYear' => "Expiry Year",
            'cvv' => "CVV",
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
            } else {
                $user = Users::model()->findByAttributes(array('username' => $this->username));
            }
            if ($user === null) {
                if (strpos($this->username, "@")) {
                    $this->addError("username", "Email is incorrect.");
                } else {
                    $this->addError("username", "Username is incorrect.");
                }
            }
        }
    }

}
