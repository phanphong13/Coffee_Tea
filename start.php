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
        include "./controller/controller_register.php";
        include "./controller/controller_category.php";
        include "./controller/controller_product.php";
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
                            include './view/modal_login.php';
                            include './view/modal_register.php';
                        ?>
                    </div>
                    
                </div>
            </div>
            <div class="header-nav">
                <ul class="h-nav__list">
                    <li class="h-nav__list-item">
                        <a href="" class="h-nav__list-item-link">
                            Trang chủ
                        </a>
                    </li>
                    <li class="h-nav__list-item">
                        <a href="" class="h-nav__list-item-link">
                            Cà phê
                        </a>
                        </li>
                    <li class="h-nav__list-item">
                        <a href="" class="h-nav__list-item-link">
                            Trà
                        </a>
                    </li>
                    <li class="h-nav__list-item">
                        <a href="" class="h-nav__list-item-link">
                            Sản phẩm
                        </a>
                    </li>
                    <li class="h-nav__list-item">
                        <a href="" class="h-nav__list-item-link">
                            Giới thiệu
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
    
        <?php 
            include "./view/container.php";
            include "./view/footer.php";

        ?>

    </div>
    
    <script src="./main.js"></script>
    <script>
        validator('#register-form');
        validator('#login-form');
    </script>
</body>
</html>

