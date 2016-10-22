<?php 

function MakeSureDBConnected($Database='core administrative database'){
	error_reporting(0);
	ini_set('display_errors', '0');
	global $DATABASES;
	if(!(isset($DATABASES[$Database]))){die('Database configuration not found for '.$Database.'. Please add to config.php.');}
	if($DATABASES[$Database]['resource']==false){
		switch($DATABASES[$Database]['type']){
			case 'mysql':
				$DATABASES[$Database]['resource'] = mysql_connect(
					$DATABASES[$Database]['hostname'],
					$DATABASES[$Database]['username'],
					$DATABASES[$Database]['password']
				) or die(mysql_error());
				mysql_select_db(
					$DATABASES[$Database]['database'],
					$DATABASES[$Database]['resource']
				);
				break;
			default:
				die('Unsupported database type: '.$DATABASES[$Database]['type']);
		}
	}
}
