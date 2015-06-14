<?php

/**
* Send Email Template To Multiple Users Form
*/

class SendTemplate extends CFormModel
{

	public $to;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// to is required
			array('to', 'required')
			
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'to'=>"To"
		);
	}


}

?>