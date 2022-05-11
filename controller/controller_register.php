<?php
	class controller_register extends controller {

		function __construct()
		{
			parent::__construct();
			if(isset($_POST['email'])) { 
				$name = $this->model->escape_string($_POST['name']);
				$email = $this->model->escape_string($_POST['email']);
				$password = $this->model->escape_string($_POST['password']);
				//search username in database
				$result = $this->model->query("select * from `account` where email = '$email';", true);
				if($result === false) die("Failed in controller_login 1");

                if(isset($_POST['signup'])) { // sign up
					if($result === NULL) {
						$data = array(
							'name' => $name,
							'email' => $email,
							'password' => $password,
						);
						if(!$this->model->insert('account', $data))
							die('sign up: Failed!');
						$alert = "Đăng kí thành công";
					} else {
						$alert = "Tên đăng kí đã tồn tại";
					}
					echo "<script type='text/javascript'>alert('$alert');
					window.location.replace('index.php');</script>";

				}
				

			}
		}
	}

?>