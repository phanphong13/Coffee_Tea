<?php 
    class controller_home extends controller {
        function __construct() {
			parent::__construct();

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
			

			if (isset($_GET['id_order']) && isset($_GET['method']) && $_GET['method'] == "delete") {
				$id_order = $_GET['id_order'];
				$orders = $this->model->delete("orders", $id_order);
				header("Location: index.php?controller=home");
				
			}

			$orderSql =  "SELECT * FROM `orders` WHERE account_id = {$_SESSION['id_account']}";
			$product_order = $this->model->query($orderSql,true) ;

			// change password
			if(isset($_POST['reset'])) { 
				$password = $this->model->escape_string($_POST['password__old']);
				$id = $_SESSION['id_account'];
				// search email in database
				$result = $this->model->query("select * from `accounts` where id = {$id};", true);
				if($result === false) die("Failed in change password");
				if($result !== NULL) {
					if ($password === $result[0]['password']) {
						$password_new = $this->model->escape_string($_POST['password']);
						$password_new2 = $this->model->escape_string($_POST['passwordX2']);
						if ($password === $password_new ) {
							$alert = "Vui lòng nhập mật khẩu mới";
							echo "<script type='text/javascript'>alert('$alert');
							window.location.replace('index.php?controller=home');</script>";
						} else if ($password_new === $password_new2) {
							$sql = "UPDATE `accounts` SET password = '$password_new' WHERE id = {$id} ;";
							$this->model->query($sql);
							$alert = "Thay đổi mật khẩu thành công";
							echo "<script type='text/javascript'>alert('$alert');
							window.location.replace('index.php?controller=start');</script>";
							// header("Location: index.php?controller=home");
						} else {
							$alert = "Nhập lại mật khẩu sai !";
							echo "<script type='text/javascript'>alert('$alert');
							window.location.replace('index.php?controller=home');</script>";
						}
					} else {
						$alert = "Mật khẩu không chính xác";
						echo "<script type='text/javascript'>alert('$alert');
							window.location.replace('index.php?controller=home');</script>";	
					}
					// $alert = "Đăng kí thành công";
				} 
			}
			
			include "./view/home.php";
        }
    }

new controller_home();
?>