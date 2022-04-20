<!DOCTYPE html>
<html lang="en">
<head>
    <title>Coffee & Tea</title>
    <?php 
        include './view/head.php';
    ?>
</head>
<body>
    <?php 
        include "./app/controller.php";
        include "./app/model.php";
        include "./controller/controller_login.php";
    ?>
    <div class="app">
        <div id="header">
            <div class="header-top">
                <div class="h-left">
                    <img src="./Assets/Img/Header/delivery.png" alt="">
                </div>
                <div class="h-center">
                    <a href="" class="h-center-logo" >
                     <img src="./Assets/Img/Header/logo-main.jpg" alt="" class = "h-center-logo-img">
                    </a>  
                </div>
                <div class="h-right">

                    <div class="h-right__text">
                        
                        <div class="h-right__text-text h-right__text-login">Đăng nhập</div>
                        <div class="h-right__text-text h-right__text-register">Đăng kí</div>
                        

                        <div for="" class="modal__overlay-login"></div>

                        <?php 
                            include './view/modal_register.php';
                        ?>
                        
                        <?php 
                            include './view/modal_login.php';
                        ?>

                    </div>
                    
                </div>
            </div>
            <div class="header-nav">
                <ul class="h-nav__list">
                    <li class="h-nav__list-item">
                        <a href="#" class="h-nav__list-item-link">
                            Trang chủ
                        </a>
                    </li>
                    <li class="h-nav__list-item">
                        <a href="#" class="h-nav__list-item-link">
                            Cà phê
                        </a>
                        </li>
                    <li class="h-nav__list-item">
                        <a href="#" class="h-nav__list-item-link">
                            Trà
                        </a>
                    </li>
                    <li class="h-nav__list-item">
                        <a href="#" class="h-nav__list-item-link">
                            Sản phẩm
                        </a>
                    </li>
                    <li class="h-nav__list-item">
                        <a href="#" class="h-nav__list-item-link">
                            Giới thiệu
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
    
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
                        <img src="./Assets/Img/Slider/tra2.jpg" alt="">
                    </div>
                    <div class="slider-item">
                        <img src="./Assets/Img/Slider/tra.jpg" alt="">
                    </div>
                    <div class="slider-item">
                        <img src="./Assets/Img/Slider/tra3.jpg" alt="">
                    </div>
                    <div class="slider-item">
                        <img src="./Assets/Img/Slider/tra4.jpg" alt="">
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
                                    <li class="category__item category__item-active">
                                        <a href="#" class="category__link category__link-active">Tất cả</a>
                                    </li>
                                    <li class="category__item">
                                        <a href="#" class="category__link">Cà phê</a>
                                    </li>
                                    <li class="category__item">
                                        <a href="#" class="category__link">Trà sữa</a>
                                    </li>
                                    <li class="category__item">
                                        <a href="#" class="category__link">Trà chanh</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col l-10 m-9 c-10">
                            <div class="body-top">
                                <div class="body-xs body-xs-left">
                                    <lable class="body-xs__header">
                                        Theo giá
                                    </lable>

                                    <button type="button" class="body-xs__btn">
                                        <div class="body-xs__btn-text">Không lựa chọn</div>
                                        <div class="body-xs__btn-icon">
                                            <i class="fa-solid fa-caret-down"></i> 
                                        </div>
                                        <div class="body-xs__list">
                                            <ul class="body-xs__lists">
                                                <li class="body-xs__lists-item">
                                                    <a href="" class="body-xs__lists-item-link">Không lựa chọn</a>
                                                </li>
                                                <li class="body-xs__lists-item">
                                                    <a href="" class="body-xs__lists-item-link">Từ thấp đến cao</a>
                                                </li>
                                                <li class="body-xs__lists-item">
                                                    <a href="" class="body-xs__lists-item-link">Từ cao đến thấp</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </button>

                                </div>
                                
                                <div class="body-xs">
                                    <lable class="body-xs__header">
                                        Tìm kiếm
                                    </lable>
                                    <div class="body-xs__input">
                                        <input type="text" class="body-xs__input-input" placeholder="Tìm kiếm">
                                        <div class="body-xs__input-btn">
                                            <div class="body-xs__input-icon">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col l-3 m-6 c-10">
                                    <div class="body__product">
                                        <div class="body__product-img">
                                            <img src="./Assets/Img/Products/TS/NgocVienDong.png" alt="">
                                        </div>
                                        <span class="body__product-heading">
                                            Ngọc viễn đông
                                        </span>
                                        <span class="body__product-price">
                                            44.182đ
                                        </span>
                                        <button class="body__product-btn">
                                            <div class="body__product-btn-order body__product-btn-order-disable">
                                                ĐẶT HÀNG
                                            </div>
                                        </button>
                                    </div>
                                </div>

                                <div class="col l-3 m-6 c-10">
                                    <div class="body__product">
                                        <div class="body__product-img">
                                            <img src="./Assets/Img/Products/TS/NgocVienDong.png" alt="">
                                        </div>
                                        <span class="body__product-heading">
                                            Ngọc viễn đông
                                        </span>
                                        <span class="body__product-price">
                                            44.182đ
                                        </span>
                                        <button class="body__product-btn">
                                            <div class="body__product-btn-order body__product-btn-order-disable">
                                                ĐẶT HÀNG
                                            </div>
                                        </button>
                                    </div>
                                </div><div class="col l-3 m-6 c-10">
                                    <div class="body__product">
                                        <div class="body__product-img">
                                            <img src="./Assets/Img/Products/TS/NgocVienDong.png" alt="">
                                        </div>
                                        <span class="body__product-heading">
                                            Ngọc viễn đông
                                        </span>
                                        <span class="body__product-price">
                                            44.182đ
                                        </span>
                                        <button class="body__product-btn">
                                            <div class="body__product-btn-order body__product-btn-order-disable">
                                                ĐẶT HÀNG
                                            </div>
                                        </button>
                                    </div>
                                </div><div class="col l-3 m-6 c-10">
                                    <div class="body__product">
                                        <div class="body__product-img">
                                            <img src="./Assets/Img/Products/TS/NgocVienDong.png" alt="">
                                        </div>
                                        <span class="body__product-heading">
                                            Ngọc viễn đông
                                        </span>
                                        <span class="body__product-price">
                                            44.182đ
                                        </span>
                                        <button class="body__product-btn">
                                            <div class="body__product-btn-order body__product-btn-order-disable">
                                                ĐẶT HÀNG
                                            </div>
                                        </button>
                                    </div>
                                </div><div class="col l-3 m-6 c-10">
                                    <div class="body__product">
                                        <div class="body__product-img">
                                            <img src="./Assets/Img/Products/TS/NgocVienDong.png" alt="">
                                        </div>
                                        <span class="body__product-heading">
                                            Ngọc viễn đông
                                        </span>
                                        <span class="body__product-price">
                                            44.182đ
                                        </span>
                                        <button class="body__product-btn">
                                            <div class="body__product-btn-order body__product-btn-order-disable">
                                                ĐẶT HÀNG
                                            </div>
                                        </button>
                                    </div>
                                </div><div class="col l-3 m-6 c-10">
                                    <div class="body__product">
                                        <div class="body__product-img">
                                            <img src="./Assets/Img/Products/TS/NgocVienDong.png" alt="">
                                        </div>
                                        <span class="body__product-heading">
                                            Ngọc viễn đông
                                        </span>
                                        <span class="body__product-price">
                                            44.182đ
                                        </span>
                                        <button class="body__product-btn">
                                            <div class="body__product-btn-order body__product-btn-order-disable">
                                                ĐẶT HÀNG
                                            </div>
                                        </button>
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


         
        <!-- footer -->
        <?php 
            include "./view/footer.php";
        ?>

    </div>
    
    
    <!-- modal order -->
    <?php 
        include './view/modal.php';
    ?>

    <script src="./main.js"></script>
    <script>
        validator('#register-form');
        validator('#login-form');
    </script>
</body>
</html>

