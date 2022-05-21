<?php 
    session_start();
	include '../app/model.php';
	$conn = new database("coffee_tea");
	$result = $_SESSION;

	$size = $_POST['size'];
	if ($_POST['size'] === "Size M") {
    	$sql = "SELECT * FROM orders WHERE product_id = {$_POST['id_product']} AND account_id = {$_SESSION['id_account']} AND size = 'Size M'";
	} else {
    	$sql = "SELECT * FROM orders WHERE product_id = {$_POST['id_product']} AND account_id = {$_SESSION['id_account']} AND size = 'Size L'";
	}
	$res = $conn->query($sql, true);
	if($res === false){
		die("Failed order 1");
		// die(json_encode($result));
	}
    $sql_p = "SELECT * FROM `products` WHERE id = {$_POST['id_product']}";
	$sp = $conn->query($sql_p, true);
    if ($_POST['size'] === "Size M") {
        $price = $sp[0]['price'];
    } else {
        $price = $sp[0]['price'] + 10000;
    }
	if ($_POST['num'] > 0) {
		if($res === NULL){
			$data = array(
				'product_id' => $_POST['id_product'],
				'account_id' => $_SESSION['id_account'],
				'price' => $price,
				'num' => $_POST['num'],
				'title' => $sp[0]['title'],
				'size' => $_POST['size'],
				'link_img' => $sp[0]['link_img'],
				'price_total' => $_POST['priceTotal']
			);
			$x = $conn->insert('orders', $data);
			if($x === false){
				die("Failed order 2");
				// die(json_encode($result));
			} 
			
			// header("Location: index.php?controller=home");
		} else {
			$num = $res[0]['num'] + $_POST['num'];
			$price = $res[0]['price_total'] + $_POST['priceTotal'];
			$sql_order = "UPDATE `orders` SET num = '$num', price_total = '$price' WHERE id = {$res[0]['id']} ;";
			$conn->query($sql_order);
		} 
	}
	die("Thêm vào giỏ hàng thành công")
    // die(json_encode($result));
?>