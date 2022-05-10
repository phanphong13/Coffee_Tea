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
                <!-- <span class="header__user-name">

                    <?php 
                        if (isset($_SESSION['email'])) {
                            echo $_SESSION['email'];
                        }
                    ?>
                </span> -->
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
                                    0
                                </div>
                            </div> 
                            <div class="header__cart-products">
                                <span class="header__cart-products-header">Sản phẩm của bạn</span>
                                <ul class="header__cart-products-list">
                                    
                                    <li class="header__cart-products-item">
                                        <div class="header__cart-products-item-img">
                                            <img src="./Assets/Img/Products/TS/NgocVienDong.png" alt="">
                                        </div>
                                        <div class="header__cart-products-item-body">
                                            <div class="header__cart-products-item-body-top">
                                                <div class="header__cart-products-item-text">Ngọc viễn đông</div>
                                            </div>
                                            <div class="header__cart-products-item-body-bottom">
                                                <div class="header__cart-products-item-price">
                                                    <span class="header__cart-products-item-price-price">
                                                        50.000 đ
                                                    </span>
                                                    <span class="header__cart-products-item-price-mul">
                                                        x
                                                    </span><span class="header__cart-products-item-price-qnt">
                                                        1
                                                    </span>
                                                </div>

                                                <div class="header__cart-products-item-delete">
                                                    Xóa
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </li>
                                    
                                </ul>
                                <div class="header__cart-products-orderAll">
                                    Xem giỏ hàng
                                </div>
                            </div>
                        </div>
                    </div>
            
        </div>
    </div>
    <div class="header-nav">
        <ul class="h-nav__list">
            <li class="h-nav__list-item">
                <a href="index.php?controller=home" class="h-nav__list-item-link">
                    Trang chủ
                </a>
            </li>
            <li class="h-nav__list-item">
                <a href="index.php?controller=coffee" class="h-nav__list-item-link h-nav__list-item-link-main ">
                    Cà phê
                </a>
                </li>
            <li class="h-nav__list-item">
                <a href="index.php?controller=tea" class="h-nav__list-item-link">
                    Trà
                </a>
            </li>
            <li class="h-nav__list-item">
                <a href="index.php?controller=product" class="h-nav__list-item-link">
                    Sản phẩm
                </a>
            </li>
            <li class="h-nav__list-item">
                <a href="index.php?controller=intro" class="h-nav__list-item-link">
                    Giới thiệu
                </a>
            </li>
            
        </ul>
    </div>
</div>