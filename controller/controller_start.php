<?php 
    class controller_start extends controller {
        function __construct() {
			parent::__construct();
			
			/* Đăng kí */
			if(isset($_POST['signup'])) { 
				$name = $this->model->escape_string($_POST['name']);
				$email = $this->model->escape_string($_POST['email']);
				$password = $this->model->escape_string($_POST['password']);
				//search username in database
				$result = $this->model->query("select * from `accounts` where email = '$email';", true);
				if($result === false) die("Failed in controller_login 1");
				if($result === NULL) {
					$data = array(
						'name' => $name,
						'type' => 'User',
						'email' => $email,
						'password' => $password,
					);
					if(!$this->model->insert('accounts', $data))
						die('sign up: Failed!');
					$alert = "Đăng kí thành công";
				} else {
					$alert = "Email đăng kí đã tồn tại";
				}
				echo "<script type='text/javascript'>alert('$alert');
				window.location.replace('index.php');</script>";
			}

			/* Đăng nhập */
			if(isset($_POST['login'])) { 
				
				$email = $this->model->escape_string($_POST['email']);
				$password = $this->model->escape_string($_POST['password']);
				$result = $this->model->query("select * from `accounts` where email = '$email';", true);
				if($result === false) die("Failed in controller_login 1");

				if($result === NULL) {
					$alert = "Email sai";
				} else {
					if($result[0]['password'] == $password) {
						 	$_SESSION['name'] = $result[0]['name'];
							$_SESSION['email'] = $email;
							$_SESSION['id_account'] = $result[0]['id'];
							$_SESSION['type'] = $result[0]['type'];
						header("Location: index.php?controller=home");
					} else {
						$alert = "Mật khẩu sai";
					}
				}
				if ($alert) {
					echo "<script type='text/javascript'>alert('$alert');
					window.location.replace('index.php');</script>";
				}

			}
			// get product
			$products = $this->model->getArray('products');
			if ($products === false) die('Failed product 0');
				
			include "./view/start.php";
        }
    }

new controller_start();
?>