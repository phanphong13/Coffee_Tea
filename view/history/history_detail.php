<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="Assets/Fonts/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="Assets/CSS/base.css">
    <link rel="stylesheet" href="Assets/CSS/grid.css">
    <link rel="stylesheet" href="Assets/CSS/transaction.css">
</head>
<body>
    <div class="header">
        <a href="?controller=history&id_account=<?php echo $_SESSION['id_account']?>" class="header__heading">
            <span>
                Quay lại
            </span>
        </a>
    </div> 
    <div class="container">
        <div class="container__body">
            <div class="body__header">
                <div class="body__header-heading">Chi tiết đơn hàng</div>
            </div>
            <div class="body__content">
                <table class="transaction">
                    <thead>
                        <tr>
                            <th class="transaction__item-top" style="width: 40%;">TÊN SẢN PHẨM</th>
                            <th class="transaction__item-top" style="width: 10%;">SIZE</th>
                            <th class="transaction__item-top" style="width: 10%;">SỐ LƯỢNG</th>
                            <th class="transaction__item-top" style="width: 20%;">GIÁ</th>
                            <th class="transaction__item-top" style="width: 20%;">TỔNG TIỀN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if (isset($result)) {
                                for ($i = 0; $i < count($result); $i++) {
                        ?>
                         <tr>
                            <th class="transaction__item"><?php echo $result[$i]['name']?></th>
                            <th class="transaction__item"><?php echo $result[$i]['size']?></th>
                            <th class="transaction__item"><?php echo $result[$i]['num']?></th>
                            <th class="transaction__item"><?php echo number_format($result[$i]['price_size'],0,'',',').' đ'?></th>
                            <th class="transaction__item"><?php echo number_format($result[$i]['price_total'],0,'',',').' đ'?></th>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                       
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>