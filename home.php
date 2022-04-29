<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Coffee & Tea</title>
    <?php 
        include "./view/head.php";
    ?>
    
</head>
<body>
    <?php 
        include "./app/controller.php";
        include "./app/model.php";
        include "./controller/controller_category.php";
        include "./controller/controller_product.php";

    ?>
    <div class="app">
        <?php  
            include "./view/header.php";
            include "./view/container.php";
            include "./view/footer.php";
        ?>

    </div>
    
    
    <!-- modal order -->
    <?php 
        include "./view/modal.php";
    ?>

    <script src="./main.js"></script>
    <script>
        validator('#register-form');
        validator('#login-form');
    </script>
</body>
</html>

