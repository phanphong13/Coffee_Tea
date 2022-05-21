<?php 
    class controller_user extends controller {
        function __construct() {
			parent::__construct();
            
            $sql = "SELECT * FROM `accounts`;";
			$result = $this->model->query($sql, true);
			include "./view/admin/user.php";
        }
    }

new controller_user();
?>