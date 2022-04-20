<?php 
	class controller {
		
		public $model;

		public function __construct(){
			$this->model = new database("coffee_tea");
		}
		
	}
 ?>