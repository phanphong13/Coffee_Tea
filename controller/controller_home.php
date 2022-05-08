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
			
			include "./home.php";
        }
    }

new controller_home();
?>