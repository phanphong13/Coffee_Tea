<?php 
    class controller_category extends controller {
        function __construct() {
			parent::__construct();

            $category = $this->model->getArray('category');
            if ($category === false) die('Failed category 0');
            for ($i = 0; $i < count($category); $i++) {
                echo '<li class="category__item">
                <a href="#" class="category__link">' . $category[$i]['name'] . '</a>
            </li>';
            }
        }
    }
?>