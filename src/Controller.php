<?php

namespace MVC;

class Controller {
    protected function render($view, $data = []) {
        extract($data);

        include "Views/$view.php";
    }

    protected function redirect($controller, $action = null) {
		$url = ROOT_URL . $controller;

        if ( !file_exists($controller . '.php') ) {
            header("Location: ".ROOT_URL. "/error");
        }

        if (method_exists($controller, $action) ) {
            header("Location: ".ROOT_URL. "/error");
        }

		if (!empty($action)) $url .= "/$action";
        
		header("Location:$url");
	}
}

?>