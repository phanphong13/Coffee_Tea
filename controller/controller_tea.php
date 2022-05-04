<?php
	class controller_tea extends controller {

		function __construct()
		{
			parent::__construct();
            
            include "./tea.php";
		}
	}

    new controller_tea();

?>