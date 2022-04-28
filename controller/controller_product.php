<?php 
    class controller_product extends controller {
        function __construct() {
			parent::__construct();

            $product = $this->model->getArray('product');
            if ($product === false) die('Failed product 0');
            for ($i = 0; $i < count($product); $i++) {
                
                echo '<div class="col l-3 m-6 c-10">
                    <div class="body__product">
                        <div class="body__product-img">
                            <img src="'. $product[$i]['link_img'] . '" alt="">
                        </div>
                        <span class="body__product-heading">' . $product[$i]['title'] . '</span>
                        <span class="body__product-price">' . $product[$i]['price'] . 'đ</span>
                        <button class="body__product-btn">
                            <div class="body__product-btn-order body__product-btn-order-disable">
                                ĐẶT HÀNG
                            </div>
                        </button>
                    </div>
                </div>';
            }
        }
    }
?>