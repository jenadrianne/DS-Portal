<?php
	session_start();
	if(session_destroy()){ // Destroying All Sessions
		header("Location: loginPage.php"); // Redirecting To Home Page
	}
?>