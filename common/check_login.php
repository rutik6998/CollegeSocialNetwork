<?php 
	// ob_start();
	// @session_start();

if(!isset($_SESSION['adm_name']))
  {
    header("Location: Student_Login.php");

    //$user = $_SESSION['admin_user'];

    //$user_type = $_SESSION['user_type'];
  }
?>