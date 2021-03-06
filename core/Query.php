<?php 

function Query(
	$SQL,
	$Database = 'core administrative database',
	$ForceFresh = false
){
	//Check that database exists and is available, and connect to it.
	MakeSureDBConnected($Database);
	
	global $DATABASES;
	switch($DATABASES[$Database]['type']){
		case 'mysql':
			$result=mysql_query($SQL,$DATABASES[$Database]['resource']) or die(mysql_error());
			if(!(is_bool($result))){
				$Output=array();
				while($Row=mysql_fetch_assoc($result)){
					$Output[]=$Row;
				}
				return $Output;
			}
			break;
		default:
			die('Unsupported database type: '.$DATABASES[$Database]['type']);
	}
	error_reporting(E_ALL);

}
