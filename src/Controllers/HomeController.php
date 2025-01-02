<?php

namespace MVC\Controllers;

use MVC\Controller;
use MVC\Models\User;

class HomeController extends Controller {
    public function index() {
        $this->render('home/index', []);
    }
}

?>