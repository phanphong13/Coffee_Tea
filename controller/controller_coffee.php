<?php
	class controller_coffee extends controller {

		function __construct()
		{
			parent::__construct();
			
            $orderSql =  "SELECT * FROM `orders` WHERE account_id = {$_SESSION['id_account']}";
			$product_order = $this->model->query($orderSql,true);
			
            include "./coffee.php";
		}
	}

    new controller_coffee();

?>