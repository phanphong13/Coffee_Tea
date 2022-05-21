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

			if (isset($_GET['sort']) && $_GET['search']) {
				$sort = $_GET['sort'];
				$search = $_GET['search'];
				switch ($sort) {
					case 'ASC':
						$sql = "SELECT * FROM `products` WHERE title LIKE '%{$search}%' ORDER BY price;";
						$products = $this->model->query($sql, true);
						if ($products === false) die('Failed product 1');						
						break;
					case 'DESC':
						$sql = "SELECT * FROM `products` WHERE title LIKE '%{$search}%' ORDER BY price DESC;";
						$products = $this->model->query($sql, true);
						if ($products === false) die('Failed product 2');
						break;
					default:
						$sql = "SELECT * FROM `products` WHERE title LIKE '%{$search}%'";
						$products = $this->model->query($sql, true);
						if ($products === false) die('Failed product 0');						
				}
			} else {
				if (!isset($_GET['id_category'])) {
					$products = $this->model->getArray('products');
					if ($products === false) die('Failed product 0');
				} else {
					$id = $_GET['id_category'];
					$sql = "SELECT * FROM `products` WHERE category_id = {$id}";
					$products = $this->model->query($sql, true);
					if($products === false) die('Failed  0');
				}
			}
			include "./view/start.php";
        }
    }

new controller_start();
?>