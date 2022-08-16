<?php

    require_once('repository/LivroRepository.php');
    include('configAdmin.php');
    session_start();

 
    if(fnDeleteLivro($_SESSION['id'])) {
        $msg = "Sucesso ao apagar o livro.";
    } else {
        $msg = "Falha ao apagar o livro.";
    }

    unset($_SESSION['id']);


        $page = "listagem_de_livros.php";
    setcookie('notify', $msg, (time() + 10), "projeto/{$page}", 'localhost');
    header("location: {$page}");
        exit;
    