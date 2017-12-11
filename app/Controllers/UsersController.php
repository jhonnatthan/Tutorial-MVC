<?php

namespace App\Controllers;
use App\Models\User;

class UsersController {

    public function index() {
        $users = User::selectAll();

        \App\View::make('users.index', [ 
            'users' => $users,
        ]);
    }

    public function create() {
        \App\View::make('users.create');
    }

    public function store() {

        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
        $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;

        if (User::save($name, $email, $gender, $birthdate)) {
            header('Location: /');
            exit;
        }
    }

    public function edit($id) {
        $user = User::selectAll($id)[0];

        \App\View::make('users.edit',[
            'user' => $user,
        ]);
    }

    public function update() {

        $id = $_POST['id'];
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
        $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : null;

        if (User::updateUser($id, $name, $email, $gender, $birthdate)) {
            header('Location: /');
            exit;
        }
    }

    public function remove($id) {

        if (User::remove($id)) {
            header('Location: /');
            exit;
        }
        
    }

}