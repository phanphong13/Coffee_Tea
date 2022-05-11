<?php 
    class controller_home extends controller {
        function __construct() {
			parent::__construct();

			if (isset($_GET['sort'])) {
				$sort = $_GET['sort'];
				switch ($sort) {
					case 'b':
						$sql = "SELECT * FROM `product` ORDER BY price;";
						$products = $this->model->query($sql, true);
						if ($products === false) die('Failed product 1');						
						break;
					case 'c':
						$sql = "SELECT * FROM `product` ORDER BY price DESC;";
						$products = $this->model->query($sql, true);
						if ($products === false) die('Failed product 2');
						break;
					default: 
						$products = $this->model->getArray('product');
						if ($products === false) die('Failed product 0');						
				}
			} else {
				if (!isset($_GET['id_category'])) {
					$products = $this->model->getArray('product');
					if ($products === false) die('Failed product 0');
				} else {
					$id = $_GET['id_category'];
					$sql = "SELECT * FROM `product` WHERE category_id = {$id}";
					$products = $this->model->query($sql, true);
					if($products === false) die('Failed  0');
				}
			}

			if (isset($_GET['id']) && isset($_GET['method']) && $_GET['method'] == "add") {
				$id_product = $_GET['id'];
				$sql = "SELECT * FROM `product` WHERE id = {$id_product}";
				$sp = $this->model->query($sql, true);
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
				header("Location: index.php?controller=home");
				
			}

			if (isset($_GET['id_order']) && isset($_GET['method']) && $_GET['method'] == "delete") {
				$id_order = $_GET['id_order'];
				$orders = $this->model->delete("orders", $id_order);	
			}

			$orderSql =  "SELECT * FROM `orders` WHERE account_id = {$_SESSION['id_account']}";
			$product_order = $this->model->query($orderSql,true);
			
			include "./home.php";
        }
    }

new controller_home();
?>