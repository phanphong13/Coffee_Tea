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
            <div class="header__user">
                <span class="header__user-name">

                    <?php 
                        if (isset($_SESSION['name'])) {
                            echo $_SESSION['name'];
                        }
                    ?>
                </span>
                <div class="header__user-img">
                    <i class="fa-solid fa-circle-user"></i>
                    <div class="header__user-logout">
                        <a href="index.php?controller=start" class="header__user-logout-link">
                            <div class="header__user-logout-icon">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </div>
                            <div class="header__user-logout-text">
                                Log Out
                            </div>
                        </a>

                    </div>
                </div>
            </div>

            <div class="header__cart">
                        <div class="header__cart-link">
                            <p class="header__cart-text">
                                Giỏ hàng
                            </p>
                            <div class="header__cart-logo">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <div class="header__cart-logo-index">
                                    <?php
                                        if ($product_order) {
                                            $num_product = 0;
                                            for ($i = 0; $i < count($product_order); $i++) {
                                                $num_product += $product_order[$i]['num'];
                                            }
                                            echo $num_product;
                                        } else {
                                            echo 0;
                                        }
                                    ?>
                                </div>
                            </div> 
                            <div class="header__cart-products">
                                <span class="header__cart-products-header">Sản phẩm của bạn</span>
                                <ul class="header__cart-products-list">
                                    <?php 
                                        if ($product_order) {
                                            for ($i = 0; $i < count($product_order); $i++) {
                                    ?>
                                                <li class="header__cart-products-item">
                                                    <div class="header__cart-products-item-img">
                                                        <img src="<?php echo $product_order[$i]['link_img']?>" alt="">
                                                    </div>
                                                    <div class="header__cart-products-item-body">
                                                        <div class="header__cart-products-item-body-top">
                                                            <div class="header__cart-products-item-text"><?php echo $product_order[$i]['title']?></div>
                                                        </div>
                                                        <div class="header__cart-products-item-body-bottom">
                                                            <div class="header__cart-products-item-price">
                                                                <span class="header__cart-products-item-price-price">
                                                                    <?php echo $product_order[$i]['price']?>đ
                                                                </span>
                                                                <span class="header__cart-products-item-price-mul">
                                                                    x
                                                                </span><span class="header__cart-products-item-price-qnt">
                                                                    <?php echo $product_order[$i]['num']?>
                                                                </span>
                                                            </div>

                                                            <a href="?method=delete&id_order=<?php echo $product_order[$i]['id'] ?>" class="header__cart-products-item-delete">
                                                                Xóa
                                                            </a>
                                                            
                                                        </div>
                                                    </div>
                                                </li>
                                    <?php
                                            }
                                    ?>
                                        <a href="?controller=payment" class="header__cart-products-orderAll">
                                            Đặt hàng
                                        </a>
                                    <?php
                                        } else {
                                    ?>
                                        <li class="header__cart-products-item">
                                            <span class="header__cart-products-item-no">
                                                Chưa có sản phẩm
                                            </span>
                                        </li>
                                    <?php
                                        }
                                
                                    ?>
                                    
                                    
                                </ul>
                                
                            </div>
                        </div>
                    </div>
            
        </div>
    </div>
    <div class="header-nav">
        <ul class="h-nav__list">
            <?php 
                if (isset($_GET['controller'])) {
                    $controller = $_GET['controller'];
                }
                if (isset($_GET['id_category'])) {
                    $id_category = $_GET['id_category'];
                }
            ?>                
            <li class="h-nav__list-item">
                <a href="index.php?controller=home" class="h-nav__list-item-link <?php if ((isset($controller) && $controller == 'home') || isset($id_category)) echo "h-nav__list-item-link-main" ?>">
                    Trang chủ
                </a>
            </li>
            <li class="h-nav__list-item">
                <a href="index.php?controller=coffee" class="h-nav__list-item-link <?php if (isset($controller) && $controller == 'coffee') echo "h-nav__list-item-link-main" ?> ">
                    Cà phê
                </a>
                </li>
            <li class="h-nav__list-item">
                <a href="index.php?controller=tea" class="h-nav__list-item-link <?php if (isset($controller) && $controller == 'tea') echo "h-nav__list-item-link-main" ?> ">
                    Trà
                </a>
            </li>
            <li class="h-nav__list-item">
                <a href="index.php?controller=product" class="h-nav__list-item-link <?php if (isset($controller) && $controller == 'product') echo "h-nav__list-item-link-main" ?> ">
                    Sản phẩm
                </a>
            </li>
            <li class="h-nav__list-item">
                <a href="index.php?controller=intro" class="h-nav__list-item-link <?php if (isset($controller) && $controller == 'intro') echo "h-nav__list-item-link-main" ?> ">
                    Giới thiệu
                </a>
            </li>
            
        </ul>
    </div>
</div>