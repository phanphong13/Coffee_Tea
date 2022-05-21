<?php 
    class controller_history_detail extends controller {
        function __construct() {
			parent::__construct();
            
            $id = $_GET['id'];

            $sql = "SELECT * FROM `payment_detail` WHERE payment_id = '$id'";
			$result = $this->model->query($sql, true);
			include "./view/history/history_detail.php";
        }
    }

new controller_history_detail();
?>