<?php
	session_start();

	if(isset($_SESSION['loginuser']) && isset($_SESSION['loginpass'])){
		if($_SESSION['officer'] == 1 && $_SESSION['student'] == 0 && $_SESSION['teacher'] == 0){
			header("Location: admin_vDSDashboard.php");
			die();
		}else{
			header("Location: student_vDSDashboard.php");
			die();
		}
	}else{
		header("location: loginPage.php");
		echo $_SESSION['Error'];

        unset($_SESSION['Error']);
	}

	session_destroy();
?>