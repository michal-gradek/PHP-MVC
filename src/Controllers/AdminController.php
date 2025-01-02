<?php

namespace MVC\Controllers;

use MVC\Controller;
use MVC\Models\Admin;

class AdminController extends Controller {
    public function menu() {
        $this->render('admin/menu', []);
    }
}

?>