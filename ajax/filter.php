<?php 
    session_start();
	include '../app/model.php';
	$conn = new database("coffee_tea");

	$id_category = $_POST['id_category'];
    if (!is_numeric($id_category)) die("Invalid id_category");
    if ($id_category == 0) {
        $sql = "SELECT * FROM products WHERE category_id IS NOT NULL ";
    } else {
        $sql = "SELECT * FROM products WHERE category_id = {$id_category} ";
    }

    if (isset($_POST['search'])) {
        $searchData = $conn->escape_string($_POST["search"]);
        $sql .= "AND title LIKE '%{$searchData}%'";
    }

    if (isset($_POST['sort_product'])) {
        if ($_POST['sort_product'] === 'DESC') {
            $sql .= "ORDER BY price DESC";
        } else if ($_POST['sort_product'] === 'ASC') {
            $sql .= "ORDER BY price ASC";
        }
    }

    $products = $conn->query($sql, true);
    if ($products === false) die('Failed');    
    if (isset($products) && count($products) > 0) {
        $html = "";
        for ($i = 0; $i < count($products); $i++) {
            $html .= '<div class="col l-3 m-6 c-10">
            <div class="body__product">
                <div class="body__product-img">
                    <img src="Assets/Img/Products/'. $products[$i]['link_img'] . '" alt="">
                </div>
                <span class="body__product-heading">' . $products[$i]['title'] . '</span>
                <span class="body__product-price">' .  number_format($products[$i]['price'],0,'',',') . 'đ</span>
                <button class="body__product-btn">
                    <div class="body__product-btn-order" stt = '.$products[$i]['id'].'>
                        ĐẶT HÀNG
                    </div>
                </button>
            </div>
        </div>';
        } 
    } else {
        $html = '<div class="col l-12 m-12 c-12">
        <span class = "body__product-noProduct">Không có sản phẩm bạn tìm kiếm</span>
        </div>';
    }
    die($html);
    
    
?>