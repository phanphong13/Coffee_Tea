<?php
	class controller_tea extends controller {

		function __construct()
		{
			parent::__construct();
			
			$orderSql =  "SELECT * FROM `orders` WHERE account_id = {$_SESSION['id_account']}";
			$product_order = $this->model->query($orderSql,true);

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
							window.location.replace('index.php?controller=tea');</script>";
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
							window.location.replace('index.php?controller=tea');</script>";
						}
					} else {
						$alert = "Mật khẩu không chính xác";
						echo "<script type='text/javascript'>alert('$alert');
							window.location.replace('index.php?controller=tea');</script>";	
					}
					// $alert = "Đăng kí thành công";
				} 
			}

            
            include "./view/tea.php";
		}
	}

    new controller_tea();

?>