<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch Sử</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="Assets/Fonts/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="Assets/CSS/base.css">
    <link rel="stylesheet" href="Assets/CSS/grid.css">
    <link rel="stylesheet" href="Assets/CSS/transaction.css">
</head>
<body>
    <div class="header">
        <a href="?controller=home" class="header__heading">
            <span>
                Trang chủ
            </span>
        </a>
    </div>
    <div class="container">
        <div class="container__body">
            <div class="body__header">
                <div class="body__header-heading">Lịch sử giao dịch của tài khoản <b><?php echo $_SESSION['email']?></b> </div>
            </div>
            <div class="body__content">
                <table class="transaction">
                    <thead>
                        <tr>
                            <th class="transaction__item-top" style="width: 12%;">ID</th>
                            <th class="transaction__item-top" style="width: 12%;">TÊN NGƯỜI NHẬN</th>
                            <th class="transaction__item-top" style="width: 20%;">EMAIL</th>
                            <th class="transaction__item-top" style="width: 20%;">ĐỊA CHỈ</th>
                            <th class="transaction__item-top" style="width: 12%;">SỐ ĐIỆN THOẠI</th>
                            <th class="transaction__item-top" style="width: 12%;">THỜI GIAN GIAO DỊCH</th>
                            <th class="transaction__item-top" style="width: 12%;">TỔNG TIỀN</th>
                            <th class="transaction__item-top" style="width: 12%;">THÔNG TIN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if (isset($result)) {
                                for ($i = 0; $i < count($result); $i++) {
                        ?>
                            <tr>
                            <th class="transaction__item"><?php echo $result[$i]['id']?></th>
                            <th class="transaction__item"><?php echo $result[$i]['name']?></th>
                            <th class="transaction__item" style="width: 20% !important;"><?php echo $result[$i]['email']?></th>
                            <th class="transaction__item" style="width: 20% !important;"><?php echo $result[$i]['address']?></th>
                            <th class="transaction__item"><?php echo $result[$i]['phone_number']?></th>
                            <th class="transaction__item"><?php echo $result[$i]['time']?></th>
                            <th class="transaction__item"><?php echo number_format($result[$i]['total_amount'],0,'',',').' đ'?></th>
                            <th class="transaction__item">
                                <a href="?controller=history_detail&id=<?php echo $result[$i]['id']?>" class="transaction__details">
                                    Chi tiết
                                </a>
                            </th>
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