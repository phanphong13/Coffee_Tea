<?php 
    class controller_product_admin extends controller {
        function __construct() {
			parent::__construct();
            
            $sql = "SELECT * FROM `products`;";
			$result = $this->model->query($sql, true);
			include "./view/admin/product_admin.php";
        }
    }

new controller_product_admin();
?>