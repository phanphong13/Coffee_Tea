<?php 
    session_start();
	include '../app/model.php';
	$conn = new database("coffee_tea");
	$sql = "DELETE FROM orders
				WHERE orders.id = {$_POST['id_order']}
				";
		if($conn->query($sql) === false){
			die("Failed");
		}
	die("Xóa khỏi giỏ hàng thành công");
?>