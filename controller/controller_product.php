<?php
	class controller_product extends controller {

		function __construct()
		{
			parent::__construct();
            
            include "./product.php";
		}
	}

    new controller_product();

?>