<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Coffee & Tea</title>
    <?php 
        include "view_child/head.php";
    ?>
    
</head>
<body>

    <div class="app">
        <?php  
            include "view_child/header.php";
        ?>
        <div id="container">
            <!-- Slidershow -->
            <div class="slidershow">
                <div class="sliders">
                    <input type="radio" name = "r" id = "r1" checked>
                    <input type="radio" name = "r" id = "r2">
                    <input type="radio" name = "r" id = "r3">
                    <input type="radio" name = "r" id = "r4">
                    <div class="slidershow__navgation">
                        <label for="r1" class="slidershow__navgation-bar slidershow__navgation-bar1"></label>
                        <label for="r2" class="slidershow__navgation-bar slidershow__navgation-bar2"></label>
                        <label for="r3" class="slidershow__navgation-bar slidershow__navgation-bar3"></label>
                        <label for="r4" class="slidershow__navgation-bar slidershow__navgation-bar4"></label>
                    </div>
                    <div class="slider-item s1">
                        <img src="Assets/Img/Slider/tra2.jpg" alt="">
                    </div>
                    <div class="slider-item">
                        <img src="Assets/Img/Slider/tra.jpg" alt="">
                    </div>
                    <div class="slider-item">
                        <img src="Assets/Img/Slider/tra3.jpg" alt="">
                    </div>
                    <div class="slider-item">
                        <img src="Assets/Img/Slider/tra4.jpg" alt="">
                    </div>
                </div>
                
            </div>

            <div class="body">
                <div class="grid wide">
                    <div class="row" style="margin-top: 50px;">
                        <div class="col l-2 m-3 c-2 category">
                            <nav class="category-body">
                                <input type="checkbox" name = "show-list" id = "category__show-list">

                                <h3 class="category__heading">
                                    <i class="fa-solid fa-list"></i>
                                    Category
                                </h3>

                                <div class="category__select-icon category__select-icon-right">
                                    <i class="fa-solid fa-caret-right"></i>
                                </div>

                                <div class="category__select-icon category__select-icon-down">
                                    <i class="fa-solid fa-caret-down"></i>
                                </div>

                                <label for = "category__show-list" class="category__select">
                                    Sản phẩm
                                </label>

                                <ul class="category__list">
                                    <?php 
                                        if (isset($_GET['id_category'])) {
                                            $id_category = $_GET['id_category'];
                                        }
                                    ?>
                                    <li class="category__item">
                                        <a href="index.php?controller=start" class="category__link <?php if (!isset($id_category)) echo "category__link-active" ?>">Tất cả</a>
                                    </li>
                                    
                                    <li class="category__item">
                                        <a href="?id_category=1" class="category__link <?php if (isset($id_category) && $id_category == 1) echo "category__link-active" ?> ">Cà phê</a>
                                    </li>
                                    <li class="category__item">
                                        <a href="?id_category=2" class="category__link <?php if (isset($id_category) && $id_category == 2) echo "category__link-active" ?> ">Trà Sữa & Trà Chanh</a>
                                    </li>
                                    <li class="category__item">
                                        <a href="?id_category=3" class="category__link <?php if (isset($id_category) && $id_category == 3) echo "category__link-active" ?> ">Nước Trái Cây</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col l-10 m-9 c-10">
                            <div class="body-top">
                                <?php 
                                    if (isset($_GET['sort'])) {
                                        $sort = $_GET['sort'];
                                    }
                                    if (isset($_GET['search'])) {
                                        $search = $_GET['search'];
                                    }
                                ?>
                                <form action="" method="GET" class = "body-top-form">
                                    <div class="body-xs body-xs-left">
                                        <label class="body-xs__header">
                                            Theo giá
                                        </label>

                                        <select id="body-xs-price" class="body-xs__select" name="sort"> <!-- add name-->
                                            <option value="">Không lựa chọn</option>
                                            <option <?php if (isset($sort) && $sort == 'ASC') echo "selected=\"selected\""; ?> value="ASC">Từ thấp đến cao</option>
                                            <option <?php if (isset($sort) && $sort == 'DESC') echo "selected=\"selected\""; ?> value="DESC">Từ cao đến thấp</option>
                                        </select>

                                    </div>
                                    
                                    <div class="body-xs">
                                        <lable class="body-xs__header">
                                            Tìm kiếm
                                        </lable>
                                        <div class="body-xs__input">
                                            <input type="text" name="search" class="body-xs__input-input" value="<?php if (isset($search)) echo $search?>"placeholder="Tìm kiếm"> <!--type submit-->
                                            <button class="body-xs__input-btn">
                                                <div class="body-xs__input-icon">
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </div>
                                            </button>
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                            
                            <div class="row">
                                <?php 
                                    if (isset($products)) {
                                    for ($i = 0; $i < count($products); $i++) {
                
                                        echo '<div class="col l-3 m-6 c-10">
                                            <div class="body__product">
                                                <div class="body__product-img">
                                                    <img src="'. $products[$i]['link_img'] . '" alt="">
                                                </div>
                                                <span class="body__product-heading">' . $products[$i]['title'] . '</span>
                                                <span class="body__product-price">' . $products[$i]['price'] . 'đ</span>
                                                <button class="body__product-btn">
                                                    <div class="body__product-btn-order">
                                                        ĐẶT HÀNG
                                                    </div>
                                                </button>
                                            </div>
                                        </div>';

                                    }
                                    } else {
                                        echo '<div class="col l-12 m-12 c-12">
                                        <span class = "body__product-noProduct">Không có sản phẩm bạn tìm kiếm</span>
                                    </div>';
                                    } 
                                ?>     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            include "view_child/footer.php";
        ?>

    </div>
    
    
    <!-- modal order -->
    <?php 
        include "view_child/modal.php";
        if (isset($products)) {
            for ($i = 0; $i < count($products); $i++) {
                includeModal($products, $i);
            }
        }
    ?>

    <script src="Assets/JS/main.js"></script>
    <script>
        validator('#register-form');
        validator('#login-form');
    </script>
</body>
</html>

