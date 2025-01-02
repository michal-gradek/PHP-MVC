<?php

namespace MVC\Models;

use MVC\Model;
use MVC\Models\Address;

class User extends Model {

    public function register() {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['username'] === "" || $post['email'] === "" || $post['password1'] === "" || $post['password2'] === "") {
            $_SESSION['message_type'] = "danger";
            $_SESSION['message'] = 'Proszę wypełnić wszystkie pola.';
            return false;
        }

        if(md5($post['password1']) !== md5($post['password2'])) {
            $_SESSION['message_type'] = "danger";
            $_SESSION['message'] = 'Różnica w hasłach.';
            return false;
        }

        $userDataId = $this->insertLastId(['INSERT INTO `users`(`username`, `password`, `email`) VALUES (:username, :pass, :email)', [":username" => $post['username'], ":pass" => md5($post['password1']), ":email" => $post['email'] ] ] );

        if($userDataId !== false ) {
            $_SESSION['is_logged_in'] = true;
            $_SESSION['user']['user_id'] = $userDataId;
            
            $userData = $this->getUserData();
            
            $_SESSION['user']["username"] = $userData[0]['username'];
            $_SESSION['user']["email"] = $userData[0]['email'];

            $_SESSION['message_type'] = "success";
            $_SESSION['message'] = 'Konto utworzono poprawnie.';

            return true;
        } else {
            return false;
        }
    }

    public function login() {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $userData = $this->select('SELECT * FROM users WHERE email = :email', [":email" => $post['email'] ] );

        if($userData) {
            if ( md5($post['password']) === $userData[0]['password'] ) {
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user'] = [ 
                    "user_id"=> $userData[0]['user_id'],
                    "username"=> $userData[0]['username'],
                    "email"=> $userData[0]['email'],
                    "is_admin"=> $userData[0]['is_admin']
                ];

                $_SESSION['message_type'] = "success";
                $_SESSION['message'] = 'Zalogowano.';

                return true;
            } else {
                $_SESSION['message_type'] = "danger";
                $_SESSION['message'] = 'Podano błędne hasło.';
                return false;
            }
        } else {
            $_SESSION['message_type'] = "danger";
            $_SESSION['message'] = 'Brak podanego użytkownika.';
            return false;
        }
    }

    public function getUserData() {
        $userData = $this->select('
            SELECT 
                    u.`user_id`,
                    u.`firstname`,
                    u.`lastname`,
                    u.`username`,
                    u.`password`,
                    u.`email`,
                    u.`phone`,
                    a.`postal_code` AS postalcode,
                    a.`city`,
                    a.`street`,
                    a.`number`
                FROM users u
                LEFT JOIN address a ON a.address_id = u.address_id
            WHERE 
                user_id = :id'
        , [":id" => $_SESSION['user']['user_id'] ] );

        return $userData[0];
    }

    public function update() {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $addres = new Address();
        $addresId = $addres->addAddress($post);

        $this->edit(
            [
                "
                    UPDATE `users`
                        SET firstname = :firstname, lastname = :lastname, phone = :phone, address_id = :address_id
                    WHERE 
                        user_id = :user_id
                ",
                [ ":user_id" => $_SESSION['user']['user_id'], ":firstname" => $post['firstname'], ":lastname" => $post['lastname'], ":phone" => $post['phone'] , ":address_id" => $addresId  ] 
            ]
        );

        $_SESSION['message_type'] = "success";
        $_SESSION['message'] = 'Dane zaktualizowane prawidłowo.';
    }

}

?>