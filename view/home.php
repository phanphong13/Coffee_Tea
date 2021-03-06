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
                                    S???n ph???m
                                </label>

                                <ul class="category__list">

                                    <li class="category__item">
                                        <div cate = "0" class="category__link">T???t c???</div>
                                    </li>
                                    
                                    <li class="category__item">
                                        <div cate = "1" class="category__link">C?? ph??</div>
                                    </li>
                                    <li class="category__item">
                                        <div cate = "2" class="category__link">Tr?? S???a & Tr?? Chanh</div>
                                    </li>
                                    <li class="category__item">
                                        <div cate = "3" class="category__link">N?????c Tr??i C??y</div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col l-10 m-9 c-10">
                            <div class="body-top">
                            <div class="body-xs body-xs-left">
                                <label class="body-xs__header">
                                    Theo gi??
                                </label>

                                <select id="body-xs-price" class="body-xs__select sort_product" name="sort"> <!-- add name-->
                                    <option value="">Kh??ng l???a ch???n</option>
                                    <option value="ASC">T??? th???p ?????n cao</option>
                                    <option value="DESC">T??? cao ?????n th???p</option>
                                </select>

                            </div>
                            
                            <div class="body-xs">
                                <lable class="body-xs__header">
                                    T??m ki???m
                                </lable>
                                <div class="body-xs__input">
                                    <input type="text" name="search" class="body-xs__input-input" id="search_product" placeholder="T??m ki???m"> <!--type submit-->
                                    <button class="body-xs__input-btn btn-search-product">
                                        <div class="body-xs__input-icon">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </div>
                                    </button>
                                </div>
                                
                            </div>
                            </div>
                            
                            <div class="row products">
                                <?php 

                                    if (isset($products)) {
                                    for ($i = 0; $i < count($products); $i++) {
                
                                        echo '<div class="col l-3 m-6 c-10">
                                            <div class="body__product">
                                                <div class="body__product-img">
                                                    <img src="Assets/Img/Products/'. $products[$i]['link_img'] . '" alt="">
                                                </div>
                                                <span class="body__product-heading">' . $products[$i]['title'] . '</span>
                                                <span class="body__product-price">' .  number_format($products[$i]['price'],0,'',',') . '??</span>
                                                <button class="body__product-btn">
                                                    <div class="body__product-btn-order"  stt = '.$products[$i]['id'].'>
                                                        ?????T H??NG
                                                    </div>
                                                </button>
                                            </div>
                                        </div>';
                                        // includeModal($products, $i);

                                    }
                                    } else {
                                        echo '<div class="col l-12 m-12 c-12">
                                        <span class = "body__product-noProduct">Kh??ng c?? s???n ph???m b???n t??m ki???m</span>
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
    <div id="backtop">
        <i class="fa-solid fa-arrow-up-long"></i>
    </div>

    <script src="Assets/JS/main.js"></script>
    <script src="Assets/JS/delete.js"></script>
    <script src="Assets/JS/filter.js"></script>

    <script>
        validator('#register-form');
        validator('#login-form');
        validator('#resetPassword-form');
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
     <script>
         $(document).ready(function() {
             $(window).scroll(function() {
                 if($(this).scrollTop()) {
                     $('#backtop').fadeIn();
                 } else {
                     $('#backtop').fadeOut();
                 }
             });
             $('#backtop').click(function() {
                 $('html, body').animate({
                     scrollTop: 0
                }, 400);
             })
         })
     </script>
</body>
</html>

