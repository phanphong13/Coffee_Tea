<?php 
    function includeModal($products, $i) {
?>
        <div class="modal">
            <div class="modal__overlay"></div>
                <div class="modal__body">
                    <div class="product__body">
                        <div class="product__container">
                            <div class="gird wide">
                                <div class="row">
                                    <div class="col l-5" >
                                        <div class="product__order-left">
                                            <div class="product__order-img">
                                                <img src="<?php echo $products[$i]['link_img'] ?>" alt="">
                                            </div>
                                            <div class="product__order-price">
                                                <?php echo number_format($products[$i]['price'],0,'',',') ?> đ
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col l-7">
                                        <div class="product__order-right">
                                            <div class="product__order-info">
                                                <div class="product__order-info__heading">
                                                    <?php echo $products[$i]['title'] ?>
                                                </div>
                                                <div class="product__order-info-icon">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </div>
                                            </div>

                                            <div class="product__order-size">
                                                <h2 class="product__order-label">
                                                    Kích cỡ
                                                </h2>
                                                
                                                <button class="product__order-size-M btn btn--size-s btn--primary">Size M</button>
                                                <button class="product__order-size-L btn btn--size-s">Size L</button>
                                            </div>

                                            <div class="product__order-number">
                                                <h2 class="product__order-label">
                                                    Số lượng
                                                </h2>
                                                <div class="product__order-number-list">
                                                    <span class="product__order-number-item product__order-number-item-left">-</span>
                                                    <span class="product__order-number-item product__order-number-item-center">1</span>
                                                    <span class="product__order-number-item product__order-number-item-right">+</span>
                                                </div>
                                            </div>

                                            <!-- <div class="product__order-notes">
                                                <h2 class="product__order-label">
                                                    Ghi chú
                                                </h2>
                                                <textarea name="" id="" cols="30" rows="10" class="product__order-notes-note"> 
                                                </textarea>
                                            </div> -->

                                            <div class="product__order-sum">
                                                <h2 class="product__order-label">
                                                    Giá tổng
                                                </h2>
                                            
                                                <div class="product__order-sum-price">
                                                        <span class="product__order-sum-price-total"><?php echo number_format($products[$i]['price'],0,'',',') ?></span>
                                                        <span> đ</span>
                                                </div>
                                            </div>

                                            <div class="product__order-order">
                                                
                                                <button onclick="addCart(<?php echo $products[$i]['id'] ?>, <?php echo $i ?>)" class="product__order-order-addCart">
                                                    <a href="" class=" product__order-order-active">
                                                        THÊM VÀO GIỎ HÀNG
                                                    </a>
                                                </button>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php    
    }
?>