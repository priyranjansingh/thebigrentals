<?php

class AdminModule extends CWebModule
{
    public $hash = 'md5';
    
	public function init()
	{
	   Yii::app()->theme = 'abound'; 
    	// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
    }

	public function beforeControllerAction($controller, $action)
	{
             
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}

	/**
     * @param $str
     * @param $params
     * @param $dic
     * @return string
     */
    public static function t($str = '', $params = array(), $dic = 'admin') {
        if (Yii::t("AdminModule", $str) == $str)
            return Yii::t("AdminModule." . $dic, $str, $params);
        else
            return Yii::t("AdminModule", $str, $params);
    }

    /**
     * @return hash string.
     */
    public static function encrypting($string = "") {
        $hash = Yii::app()->getModule('admin')->hash;
        if ($hash == "md5")
            return md5($string);
        if ($hash == "sha1")
            return sha1($string);
        else
            return hash($hash, $string);
    }

    /**
     * @param $place
     * @return boolean 
     */
    public static function doCaptcha($place = '') {
        if (!extension_loaded('gd'))
            return false;
        if (in_array($place, Yii::app()->getModule('admin')->captcha))
            return Yii::app()->getModule('admin')->captcha[$place];
        return false;
    }
}
