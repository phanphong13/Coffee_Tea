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
                        session_start();
                        if (isset($_SESSION['email'])) {
                            echo $_SESSION['email'];
                        }
                    ?>
                </span>
                <div class="header__user-img">
                    <i class="fa-solid fa-circle-user"></i>
                    <div class="header__user-logout">
                        <a href="index.php" class="header__user-logout-link">
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
                <a href="" class="header__cart-link">
                    <p class="header__cart-text">
                        Giỏ hàng
                    </p>
                    <div class="header__cart-logo">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <div class="header__cart-logo-index">
                            0
                        </div>
                    </div> 
                </a>
            </div>
            
        </div>
    </div>
    <div class="header-nav">
        <ul class="h-nav__list">
            <li class="h-nav__list-item">
                <a href="home.php" class="h-nav__list-item-link">
                    Trang chủ
                </a>
            </li>
            <li class="h-nav__list-item">
                <a href="coffee.php" class="h-nav__list-item-link h-nav__list-item-link-main ">
                    Cà phê
                </a>
                </li>
            <li class="h-nav__list-item">
                <a href="tea.php" class="h-nav__list-item-link">
                    Trà
                </a>
            </li>
            <li class="h-nav__list-item">
                <a href="product.php" class="h-nav__list-item-link">
                    Sản phẩm
                </a>
            </li>
            <li class="h-nav__list-item">
                <a href="intro.php" class="h-nav__list-item-link">
                    Giới thiệu
                </a>
            </li>
            
        </ul>
    </div>
</div>