<?php 
	session_start();
	session_destroy();
	setcookie("remember_name","",time()-86400);
	header("location: index.php");
?>