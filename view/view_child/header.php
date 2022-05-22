<div id="header">
    <div class="header-top">
        <div class="h-left">
            <div class="h-left--logo">
                <img src="Assets/Img/Header/delivery.png" alt="">
            </div>
        </div>
        <div class="h-center">
            <a href="" class="h-center-logo" >
                <img src="Assets/Img/Header/logo-main.jpg" alt="" class = "h-center-logo-img">
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
                    <!-- <div class="header__user-logout">
                        <a href="index.php?controller=start" class="header__user-logout-link">
                            <div class="header__user-logout-icon">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </div>
                            <div class="header__user-logout-text">
                                Log Out
                            </div>
                        </a>

                    </div> -->
                    <div class="header__user-info">
                            <span class="header__user-info--email">
                            <?php 
                                if (isset($_SESSION['email'])) {
                                    echo $_SESSION['email'];
                                }
                            ?>
                            </span>
                            
                            <?php 
                                if (isset($_SESSION['type']) && $_SESSION['type'] === 'Admin') {
                                    ?>
                            <a href="?controller=user" class="header__user-info--setting">
                                <i class="fa-solid fa-gear"></i>
                                Quản lý cửa hàng
                            </a>
                                    <?php
                                }
                            ?>
                            

                            <a href="?controller=history&id_account=<?php echo $_SESSION['id_account']?>" class="header__user-info--history">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                                Lịch sử mua hàng
                            </a> 

                            <span class="header__user-info--resetPassword">
                                <i class="fa-solid fa-key"></i>
                                Đổi mật khẩu
                            </span>

                            <div for="" class="modal__overlay-login"></div>

                            <!-- Form resetPassword -->
                            <div class="modal__resetPassword">
                                <div class="modal__body">
                                    <div class="auth-form">
                                        <div class="auth-form__container">

                                            <form action="" method="post" id="resetPassword-form">
                                                
                                                <div class="auth-form__header">
                                                    <h3 class="auth-form__heading">
                                                        Đổi mật khẩu
                                                    </h3>
                                                    
                                                </div>
                            
                                                <div class="auth-form__form">
                                                    <div class="auth-form__group">
                                                        <label for="" class="auth-form__title">Nhập mật khẩu hiện tại</label>
                                                        <input required type="password" name="password__old" class="auth-form__input" rules="required" required placeholder="Nhập mật khẩu hiện tại của bạn" autocomplete="on">
                                                        <span class="auth-form__error"></span>
                                                    </div>
                                                    <div class="auth-form__group">
                                                        <label for="" class="auth-form__title">Nhập mật khẩu mới</label>
                                                        <input required type="password" name="password" class="auth-form__input" rules="required|min:6" required placeholder="Nhập mật khẩu mới của bạn" autocomplete="on">
                                                        <span class="auth-form__error"></span>
                                                    </div>
                                                    <div class="auth-form__group">
                                                        <label for="" class="auth-form__title">Nhập lại mật khẩu</label>
                                                        <input required type="password" name="passwordX2" class="auth-form__input" rules="required|isConfirm" required placeholder="Nhập lại mật khẩu của bạn" autocomplete="on">
                                                        <span class="auth-form__error"></span>
                                                    </div>
                                                </div>
                            
                                                <div class="auth-form__controls">
                                                    <button name="reset" class="btn btn--primary" style = "margin-bottom: 20px;">XÁC NHẬN</button>
                                                </div>
                                                
                                            </form>
                                        </div>
                        
                                    </div>
                                </div>
                            </div> 

                            <div onclick="logout()" class="header__user-info--logout">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                Đăng xuất
                            </div>
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
                                                        <img src="Assets/Img/Products/<?php echo $product_order[$i]['link_img']?>" alt="">
                                                    </div>
                                                    <div class="header__cart-products-item-body">
                                                        <div class="header__cart-products-item-body-top">
                                                            <div class="header__cart-products-item-text"><?php echo $product_order[$i]['title']."(".$product_order[$i]['size'].")"?></div>
                                                        </div>
                                                        <div class="header__cart-products-item-body-bottom">
                                                            <div class="header__cart-products-item-price">
                                                                <span class="header__cart-products-item-price-price">
                                                                    <?php echo number_format($product_order[$i]['price'],0,'',',') ?> đ
                                                                </span>
                                                                <span class="header__cart-products-item-price-mul">
                                                                    x
                                                                </span><span class="header__cart-products-item-price-qnt">
                                                                    <?php echo $product_order[$i]['num']?>
                                                                </span>
                                                            </div>

                                                            <a href="" onclick="deleteOrder(<?php echo $product_order[$i]['id'] ?>)" class="header__cart-products-item-delete">
                                                                Xóa
                                                            </a>
                                                            
                                                        </div>
                                                    </div>
                                                </li>
                                    <?php
                                            }
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
                                <?php 
                                    if ($product_order) {
                                ?>
                                <a href="?controller=payment" class="header__cart-products-orderAll">
                                    Đặt hàng
                                </a>
                                <?php }?>

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