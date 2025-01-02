<?php

use MVC\Router;
use MVC\Controllers\UserController;
use MVC\Controllers\HomeController;
use MVC\Controllers\OrderController;
use MVC\Controllers\DashboardController;
use MVC\Controllers\AdminController;

class init {

    protected $router;

    public function __construct($url) {
        $this->router = new Router($url);
    }

    public function init() {
        session_start();

        $this->router->addRoute('/', HomeController::class, 'index');
        $this->router->addRoute('/user', UserController::class, 'index');
        $this->router->addRoute('/user/update', UserController::class, 'update');
        $this->router->addRoute('/user/login', UserController::class, 'login');
        $this->router->addRoute('/user/profil', UserController::class, 'profil');
        $this->router->addRoute('/user/register', UserController::class, 'register');
        $this->router->addRoute('/user/createUser', UserController::class, 'createUser');
        $this->router->addRoute('/user/authenticate', UserController::class, 'authenticate');
        $this->router->addRoute('/user/logout', UserController::class, 'logout');

        $this->router->addRoute('/order/cart', OrderController::class, 'cart');
        $this->router->addRoute('/order/checkout', OrderController::class, 'checkout');
        $this->router->addRoute('/order/confirm', OrderController::class, 'confirm');

        $this->router->addRoute('/admin/menu', AdminController::class, 'menu');
        $this->router->addRoute('/admin/dashboard', DashboardController::class, 'dashboard');

        $this->router->dispatch();
    }
}

?>