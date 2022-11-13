<?php

function check_login()
{

	if($_SESSION['access'] != 2)
	{
        echo "<script>alert('Unauthorized access.'); window.location.href='index.php';</script>";
		die;
	}

	
	//redirect to login

}

function check_userlogin(){
	if($_SESSION['loggedin'] != 1){
		echo "<script>alert('You are not logged in.'); window.location.href='index.php';</script>";
		die;
	}
}

function checkLogin(){
	if($_SESSION['loggedin'] != 1){
		echo "<script>alert('You are not logged in.'); window.location.href='index.php';</script>";
		die;
	}
}


?>