<?php 
    class controller_payment extends controller {
        function __construct() {
			parent::__construct();

			if (isset($_GET['id_order']) && isset($_GET['method']) && $_GET['method'] == "delete") {
				$id_order = $_GET['id_order'];
				$orders = $this->model->delete("orders", $id_order);	
			}

			$orderSql =  "SELECT * FROM `orders` WHERE account_id = {$_SESSION['id_account']}";
			$product_order = $this->model->query($orderSql,true);
			$sum = 0;
			if ($product_order) {
				for ($i = 0; $i < count($product_order); $i++) {
					$sum += $product_order[$i]['price'] * $product_order[$i]['num'];
				}
			}
			if ($product_order) {
				if(isset($_POST['order']) && isset($_POST['name'])) { 
					$name = $this->model->escape_string($_POST['name']);
					$email = $this->model->escape_string($_POST['email']);
					$address = $this->model->escape_string($_POST['address']);
					$phoneNumber = $this->model->escape_string($_POST['phoneNumber']);
					

					
					$data = array(
						'account_id' => $_SESSION['id_account'],
						'name' => $name,
						'email' => $email,
						'address' => $address,
						'phone_number' => $phoneNumber,
						'total_amount' => $sum,
					);
					if(!$this->model->insert('payments', $data))
						die('Booking: Failed!');
					header('Location: ?controller=success');
					$order = $this->model->deleteOrder('orders', $_SESSION['id_account']);
				}
			}
			
			include "./payment.php";
        }
    }

new controller_payment();
?>