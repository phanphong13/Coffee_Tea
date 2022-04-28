<?php
	class controller_login extends controller {

		function __construct()
		{
			parent::__construct();

			if(isset($_POST['email'])) { 
				$email = $this->model->escape_string($_POST['email']);
				$password = $this->model->escape_string($_POST['password']);

				//search username in database
				$result = $this->model->query("select * from `account` where email = '$email';", true);
				if($result === false) die("Failed in controller_login 1");
			
				if(isset($_POST['login'])) {
					// register
				   if($result === NULL) {
					   $alert = "Tên đăng nhập sai";
				   } else {
					   if($result[0]['password'] === $password) {
						   $_SESSION['email'] = $email;
						   header("Location: home.php");
					   } else {
						   $alert = "Mật khẩu sai";
					   }
				   }
				   echo "<script type='text/javascript'>alert('$alert');</script>";

			   } 

			}
		}
	}

?>