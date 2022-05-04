<?php
	class controller_intro extends controller {

		function __construct()
		{
			parent::__construct();
            
            include "./intro.php";
		}
	}

    new controller_intro();

?>