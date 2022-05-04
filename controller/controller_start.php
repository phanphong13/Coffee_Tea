<?php 
    class controller_start extends controller {
        function __construct() {
			parent::__construct();

			// if (!isset($_POST['sort'])) {
			// 	$sort = $_POST['sort'];
			// 	switch ($sort) {
			// 		case 'b':
			// 			if (!isset($_GET['id_category'])) {
			// 				$sql = "SELECT * FROM `product` ORDER BY price;";
			// 				$products = $this->model->query($sql, true);
			// 				if ($products === false) die('Failed product 1');
			// 			} else {
			// 				$id = $_GET['id_category'];
			// 				$sql = "SELECT * FROM `product` WHERE category_id = {$id} ORDER BY price;";
			// 				$products = $this->model->query($sql, true);
			// 				if($products === false) die('Failed  1');
			// 			}
			// 			break;
			// 		case 'c':
			// 			if (!isset($_GET['id_category'])) {
			// 				$sql = "SELECT * FROM `product` ORDER BY price DESC;";
			// 				$products = $this->model->query($sql, true);
			// 				if ($products === false) die('Failed product 2');
			// 			} else {
			// 				$id = $_GET['id_category'];
			// 				$sql = "SELECT * FROM `product` WHERE category_id = {$id} ORDER BY price DESC;";
			// 				$products = $this->model->query($sql, true);
			// 				if($products === false) die('Failed  2');
			// 			}
			// 			break;
			// 		default: 
			// 				if (!isset($_GET['id_category'])) {
			// 					$products = $this->model->getArray('product');
			// 					if ($products === false) die('Failed product 0');
			// 				} else {
			// 					$id = $_GET['id_category'];
			// 					$sql = "SELECT * FROM `product` WHERE category_id = {$id}";
			// 					$products = $this->model->query($sql, true);
			// 					if($products === false) die('Failed  0');
			// 				}
						
			// 	}
			// } else {
			// 	if (!isset($_GET['id_category'])) {
			// 	$products = $this->model->getArray('product');
            // 	if ($products === false) die('Failed product 0');
			// } else {
			// 	$id = $_GET['id_category'];
			// 	$sql = "SELECT * FROM `product` WHERE category_id = {$id}";
			// 	$products = $this->model->query($sql, true);
			// 	if($products === false) die('Failed  0');
			// }
			// }

			

			if (!isset($_GET['id_category'])) {
				$products = $this->model->getArray('product');
            	if ($products === false) die('Failed product 0');
			} else {
				$id = $_GET['id_category'];
				$sql = "SELECT * FROM `product` WHERE category_id = {$id}";
				$products = $this->model->query($sql, true);
				if($products === false) die('Failed  0');
			}
			include "./start.php";
        }
    }

new controller_start();
?>