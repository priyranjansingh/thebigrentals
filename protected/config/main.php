<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
require_once( dirname(__FILE__) . '/../components/helpers.php');
require(dirname(__FILE__).'/bigrentals.php');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'The Big Rentals',
	'defaultController' => 'properties',
	// preloading 'log' component
	'preload'=>array('log'),
	'theme' => 'tbr',
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'admin' => array(
				'defaultController' => 'login',
			),
		'user',
		'properties',
		'test',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
                 'Smtpmail'=>array(
            'class'=>'application.extensions.smtpmail.PHPMailer',
            'Host'=>"smtp.gmail.com",
            'Username'=>'arommatech@gmail.com',
            'Password'=>'neeraj@priyranjan',
            'Mailer'=>'smtp',
            'Port'=>465,
            'SMTPAuth'=>true, 
        ),
        's3'=>array(
            'class'=>'ext.s3.S3',
        ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				 '<module:(admin)>/<controller:\w+>/<action:\w+>/<id:(.*?)>' => '<module>/<controller>/<action>/<id>',
                 '<module:(admin)>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                 '<module:(admin)>/<controller:\w+>' => '<module>/<controller>',
                 '<module:(gii)>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                 '<module:(gii)>/<controller:\w+>' => '<module>/<controller>',
                 '<module:\w+>/<action:\w+>/<id:(.*?)>' => '<module>/default/<action>/<id>',
                 '<module:\w+>/<action:\w+>' => '<module>/default/<action>',
                //'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				//'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				//'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=> $params,
);
