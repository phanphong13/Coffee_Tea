<?php 
    class controller_start extends controller {
        function __construct() {
			parent::__construct();
			
			if (isset($_GET['sort']) && $_GET['search']) {
				$sort = $_GET['sort'];
				$search = $_GET['search'];
				switch ($sort) {
					case 'ASC':
						$sql = "SELECT * FROM `product` WHERE title LIKE '%{$search}%' ORDER BY price;";
						$products = $this->model->query($sql, true);
						if ($products === false) die('Failed product 1');						
						break;
					case 'DESC':
						$sql = "SELECT * FROM `product` WHERE title LIKE '%{$search}%' ORDER BY price DESC;";
						$products = $this->model->query($sql, true);
						if ($products === false) die('Failed product 2');
						break;
					default:
						$sql = "SELECT * FROM `product` WHERE title LIKE '%{$search}%'";
						$products = $this->model->query($sql, true);
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
			include "./start.php";
        }
    }

new controller_start();
?>