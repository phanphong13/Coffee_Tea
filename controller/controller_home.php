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
			
			include "./view/home.php";
        }
    }

new controller_home();
?>