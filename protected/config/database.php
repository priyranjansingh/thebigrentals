<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=localhost;dbname=dealrkzy_br',
	'emulatePrepare' => true,
	'username' => 'dealrkzy_br',
	'password' => 'thebigrentals123',
	'charset' => 'utf8',
	
);