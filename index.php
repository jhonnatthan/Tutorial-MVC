<?php

    require 'vendor/autoload.php';
    require 'init.php';

    $app = new \Slim\App([ 'settings' => [
            'displayErrorDetails' => true
        ]
    ]);

    // página inicial
    // listagem de usuários
    $app->get('/', function() {
        $UsersController = new \App\Controllers\UsersController();
        $UsersController->index();
    });

    // adição de usuário
    // exibe o formulário de cadastro
    $app->get('/add', function () {
        $UsersController = new \App\Controllers\UsersController();
        $UsersController->create();
    });

    // processa o formulário de cadastro
    $app->post('/add', function () {
        $UsersController = new \App\Controllers\UsersController;
        $UsersController->store();
    });

    // edição de usuário
    // exibe o formulário de edição
    $app->get('/edit/{id}', function ($request) {
        // pega o ID da URL
        $id = $request->getAttribute('id');

        $UsersController = new \App\Controllers\UsersController;
        $UsersController->edit($id);
    });

    // processa o formulário de edição
    $app->post('/edit', function () {
        $UsersController = new \App\Controllers\UsersController;
        $UsersController->update();
    });

    // remove um usuário
    $app->get('/remove/{id}', function ($request) {
        // pega o ID da URL
        $id = $request->getAttribute('id');

        $UsersController = new \App\Controllers\UsersController;
        $UsersController->remove($id);
    });

    $app->run();

?>