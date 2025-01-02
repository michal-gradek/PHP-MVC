<?php

namespace MVC\Controllers;

use MVC\Controller;
use MVC\Models\User;

class UserController extends Controller {

    public function login() {
        $this->render('user/login', []);
    }

    public function register() {
        $this->render('user/register', []);
    }

    public function profil() {
        $model = new User();
        $userData = $model->getUserData();

        $this->render('user/profil', ["userData" => $userData]);
    }

    public function update() {
        $model = new User();
        $model->update();
        
        $this->redirect('user/profil');
    }

    public function authenticate() {
        $model = new User();
        
        if ($model->login()) {
			$this->redirect('');
		} else {
            $this->redirect('user/login');
        }
    }

    public function createUser() {
        $model = new User();
        
        if ($model->register()) {
			$this->redirect('');
		} else {
            $this->redirect('user/register');
        }
    }

    public function logout() {
        session_destroy();

        $this->redirect('');
    }
    
    
}

?>