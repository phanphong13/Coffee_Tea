<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>>Introduction</title>
    <?php 
        include "./view/head.php";
    ?>
</head>
<body>
    <div class="app">
        <div id="header">
             <!-- header-top -->
             <?php 
                include "./view/header_top.php";
            ?>

            <div class="header-nav">
                <ul class="h-nav__list">
                    <li class="h-nav__list-item">
                        <a href="home.php" class="h-nav__list-item-link">
                            Trang chủ
                        </a>
                    </li>
                    <li class="h-nav__list-item">
                        <a href="coffee.php" class="h-nav__list-item-link">
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
                        <a href="intro.php" class="h-nav__list-item-link h-nav__list-item-link-main ">
                            Giới thiệu
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
    
        <div id="container">
            <div class="slidershow">
                <div class="sliders">
                    <div class="slider-item s1">
                        <img src="./Assets/Img/Slider/tra2.jpg" alt="">
                    </div>
                </div>
                
            </div>
        </div>
        
    
       <!-- footer -->
       <?php 
            include "./view/footer.php";
        ?>

    </div>
</body>
</html>