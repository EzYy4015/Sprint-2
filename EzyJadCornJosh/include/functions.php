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

?>