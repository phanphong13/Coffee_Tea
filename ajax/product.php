<?php 
    session_start();
	include '../app/model.php';
	$conn = new database("coffee_tea");

	$id = $_POST['id'];
    $title = $_POST['title'];
    $link_img = $_POST['link_img'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    if (!$title || !$link_img || !$price || !$category_id) {
        die("Vui lòng nhập đầy đủ thông tin");
    } else {
        if (!is_numeric($price)) die("Invalid price");
        if (!is_numeric($category_id)) die("Invalid category_id");
        
        if ($id > 0) {
            $sql = "UPDATE `products` SET title = '$title', link_img = '$link_img', price = '$price', category_id = '$category_id' WHERE id = {$id} ;";
            $conn->query($sql);
            // die("Thay đổi thành công");  
        } else {
            $data = array(
                'title' => $title,
                'link_img' => $link_img,
                'price' => $price,
                'category_id' => $category_id
            );
            $re = $conn->insert('products', $data);
            if(!$re)
                die('Không thể thêm');
            // else die("Thêm sản phẩm thành công");
        }
    }
?>