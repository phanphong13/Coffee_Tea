<?php 
    class controller_history extends controller {
        function __construct() {
			parent::__construct();
            
            $id_account = $_GET['id_account'];

            $sql = "SELECT * FROM `payments` WHERE account_id = '$id_account'";
			$result = $this->model->query($sql, true);
			include "./view/history/history.php";
        }
    }

new controller_history();
?>