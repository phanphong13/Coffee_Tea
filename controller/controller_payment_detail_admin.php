<?php 
    class controller_payment_detail_admin extends controller {
        function __construct() {
			parent::__construct();
            
            $id_payment = $_GET['id_payment'];
            $sql = "SELECT * FROM `payment_detail` WHERE payment_id = {$id_payment};";
			$result = $this->model->query($sql, true);
			include "./view/admin/payment_detail_admin.php";
        }
    }

new controller_payment_detail_admin();
?>