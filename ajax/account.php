<?php 
    session_start();
	include '../app/model.php';
	$conn = new database("coffee_tea");
	$id = $_POST['id'];
    $type = $_POST['type'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!$type || !$name || !$email || !$password) {
        die("Vui lòng nhập đầy đủ thông tin"); 
    } else {
        if ($id > 0) {
            $sql = "UPDATE `accounts` SET type = '$type', name = '$name', password = '$password' WHERE id = {$id} ;";
            $conn->query($sql);
            // die("Thay đổi thành công");    
        } else {
            $sql = "SELECT * FROM `accounts` WHERE email = '$email'";
            $result = $conn->query($sql, true);
            if ($result === false) die("Failed");
            if ($result === Null) {
                $data = array(
                    'type' => $type,
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                );
                if(!$conn->insert('accounts', $data))
                    die('Không thể thêm');
                // else die("Thêm tài khoản thành công");
            } else die("Email này đã đăng kí rồi");   
        }
    }
    

?>