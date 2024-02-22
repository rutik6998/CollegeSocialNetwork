<?php
	@session_start();
	$mysqli=mysqli_connect("localhost","root","","demo_project6");
	
	if(!$mysqli)
{

	die("could not connect to server".mysqli_error());
}

?>