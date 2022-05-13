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

			if (isset($_GET['id']) && isset($_GET['method']) && $_GET['method'] == "add") {
				$id_product = $_GET['id'];
				$result = $this->model->query("select * from `orders` where product_id = '$id_product';", true);
				if($result === false) die("Failed in controller_login 1");
				$sql = "SELECT * FROM `products` WHERE id = {$id_product}";
				$sp = $this->model->query($sql, true);
				if ($result === NULL) {
					
					if ($sp === false) die('Failed');
					$data = array(
						'product_id' => $id_product,
						'account_id' => $_SESSION['id_account'],
						'price' => $sp[0]['price'],
						'num' => 1,
						'title' => $sp[0]['title'],
						'link_img' => $sp[0]['link_img'],
						'price_total' => $sp[0]['price']
					);
					if(!$this->model->insert('orders', $data))
						die('Insert order: Failed!');
				} else {
					$num = $result[0]['num'] + 1;
					$price = $result[0]['price'] * $num;
					$sql_order = "UPDATE `orders` SET num = '$num', price_total = '$price' WHERE product_id = '$id_product';";
					$this->model->query($sql_order);
				}
				header("Location: index.php?controller=home");

			}

			if (isset($_GET['id_order']) && isset($_GET['method']) && $_GET['method'] == "delete") {
				$id_order = $_GET['id_order'];
				$orders = $this->model->delete("orders", $id_order);	
			}

			$orderSql =  "SELECT * FROM `orders` WHERE account_id = {$_SESSION['id_account']}";
			$product_order = $this->model->query($orderSql,true) ;
			
			include "./view/home.php";
        }
    }

new controller_home();
?>