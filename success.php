<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>>Order Success</title>
    <?php include "./view/head.php"?>
</head>
<body>
    <div class="grid wide">
        <div class="row">
            <div class="payment__success">
                <div class="payment__success-icon">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <div class="payment__success-text">
                    <span>Thanh toán thành công</span>
                </div>
                <a href="?controller=home" class="payment__success-back">>>Về trang chủ</a>
            </div>
        </div>
    </div>
    <?php 
        include "./view/footer.php";
    ?>


</body>
</html>