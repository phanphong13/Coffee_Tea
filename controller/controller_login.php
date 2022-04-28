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
				// $result = NULL;
				if(isset($_POST['signup'])) { // sign up

					if($result === NULL) {
						$data = array(
							'email' => $email,
							'password' => $password,
						);
						if(!$this->model->insert('account', $data))
							die('sign up: Failed!');
						$alert = "Đăng kí thành công";
					} else {
						$alert = "Tên đăng kí đã tồn tại";
					}
				} else if(isset($_POST['signin'])) {
					 // sign in
					// if($result === NULL) {
					// 	$alert = "Tên đăng nhập sai";
					// } else {
					// 	if($result[0]['password'] == $password) {
					// 		$_SESSION['email'] = $email;
					// 		header("Location: index.php?key=home");
					// 	} else {
					// 		$alert = "Mật khẩu sai";
					// 	}
					// }
				} 	
			}
		}
	}

?>