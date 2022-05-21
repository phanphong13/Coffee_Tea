<?php 
    class controller_payment extends controller {
        function __construct() {
			parent::__construct();

			// if (isset($_GET['id_order']) && isset($_GET['method']) && $_GET['method'] == "delete") {
			// 	$id_order = $_GET['id_order'];
			// 	$orders = $this->model->delete("orders", $id_order);	
			// }

			$orderSql =  "SELECT * FROM `orders` WHERE account_id = {$_SESSION['id_account']}";
			$product_order = $this->model->query($orderSql,true);
			$sum = 0;
			if ($product_order) {
				for ($i = 0; $i < count($product_order); $i++) {
					$sum += $product_order[$i]['price_total'];
				}
			}
			if ($product_order) {
				if(isset($_POST['order']) && isset($_POST['name'])) { 
					$name = $this->model->escape_string($_POST['name']);
					$email = $this->model->escape_string($_POST['email']);
					$address = $this->model->escape_string($_POST['address']);
					$phoneNumber = $this->model->escape_string($_POST['phoneNumber']);
					
					if ($sum > 0) {
						$data = array(
							'account_id' => $_SESSION['id_account'],
							'time' => date('Y-m-d H:i:s'),
							'name' => $name,
							'email' => $email,
							'address' => $address,
							'phone_number' => $phoneNumber,
							'total_amount' => $sum,
						);
						$re = $this->model->insert('payments', $data);
						if(!$re) {
							die('Booking: Failed!');
						} else {
							for ($i = 0; $i < count($product_order); $i++) {
								$data = array(
									'payment_id' => $re,
									'name' => $product_order[$i]['title'],
									'num' => $product_order[$i]['num'],
									'size' => $product_order[$i]['size'],
									'link_img' => $product_order[$i]['link_img'],
									'price_size' => $product_order[$i]['price'],
									'price_total' => $product_order[$i]['price_total'],
								);
								if (!$this->model->insert('payment_detail', $data)) 
									die("Failed");
							}
						}
							
						
						header('Location: ?controller=success');
						$order = $this->model->deleteOrder('orders', $_SESSION['id_account']);
					} else {
						echo "<script type='text/javascript'>alert('Không có sản phẩm nào trong giỏ hàng !');
							window.location.replace('index.php?controller=payment');</script>";
					}
					
				}
			} 
			
			include "./view/payment.php";
        }
    }

new controller_payment();
?>