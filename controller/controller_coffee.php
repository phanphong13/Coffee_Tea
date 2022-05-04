<?php
	class controller_coffee extends controller {

		function __construct()
		{
			parent::__construct();
            
            include "./coffee.php";
		}
	}

    new controller_coffee();

?>