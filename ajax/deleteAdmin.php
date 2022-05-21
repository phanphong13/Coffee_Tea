<?php 
    session_start();
	include '../app/model.php';
	$conn = new database("coffee_tea");
	$id = $_POST['id'];
    $type = $_POST['type'];
    if ($id > 0) {
        switch($type) {
            case "account" :
                // if ($id === 1) die ("Không thể xóa tài khoản này");
                $sql = "DELETE FROM accounts
                    WHERE accounts.id = {$id}
                    ";
                if($conn->query($sql) === false){
                    $error = "Failed delete account";
                    die($error);
                }
                break;
            case "product" :
                // delete color product_id = $id
                $sql = "DELETE FROM products WHERE id = {$id}";
                if($conn->query($sql) === false){
                    $error = "Failed delete product";
                    die($error);
                }
        }
    }
?>