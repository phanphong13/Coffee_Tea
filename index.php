<?php 
    session_start();
	include "./app/controller.php";
    include "./app/model.php";

    if(isset($_SESSION['email'])) {
		$controller = isset($_GET['controller']) ? $_GET['controller']:"home";
		// if($controller == 'start') $controller = 'home';
	} else {
		$controller = 'start';
	}
	if ($controller == 'start') unset($_SESSION['email']);
	include "./controller/controller_$controller.php";

?>