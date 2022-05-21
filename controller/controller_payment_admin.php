<?php 
    class controller_payment_admin extends controller {
        function __construct() {
			parent::__construct();
            
            $sql = "SELECT * FROM `payments`;";
			$result = $this->model->query($sql, true);
			include "./view/admin/payment_admin.php";
        }
    }

new controller_payment_admin();
?>