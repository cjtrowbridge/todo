<?php 

session_start();

if(isset($_GET['logout'])){
	session_destroy();
	header('Location: ./');
	exit;
}

if(
	isset($_SESSION['Auth'])&&
	($_SESSION['Auth']['Expires']>time())
){
	
}else{
	$_SESSION['Auth']=array(
		'Have Attempted Auth' 	=> false,
		'Logged In'		=> false,
		'Last Validated'	=> 0,
		'Expires'		=> 0
	);
}

function LoggedIn(){
	/*
	
		This function determines whether the user is logged in and returns true or false
	
	*/
	
	//check for a current session and determine whether the user has one
	Event('Verify Session');
	
	if($_SESSION['Auth']['Logged In']==true){
		
		//we already checked and the user is logged in!
		return true;
		
	}else{
		//if($_SESSION['Auth']['Have Attempted Auth']==false){
			
			//we need to attempt to authorize the user. one of the called hooks should change the 'Logged In' to true if it was able to authorize the user.
			Event('Attempt Auth');
			
			//dont try again to authorize the user
			//$_SESSION['Auth']['Have Attempted Auth']==true;
			
			//check whether we were sucesful in authorizing the user
			if($_SESSION['Auth']['Logged In']==true){
				return true;
			}else{
				return false;
			}
			
		//}else{
			
			//we already tried to authorize the user and we were not able to authorize the user
			//return false;
			
		//}
	}
}
