<?php

    require_once('./repository/LivroRepository.php');
    require_once('util/base64.php');
    include('configAdmin.php');

    $id = filter_input(INPUT_POST, 'idLivro', FILTER_SANITIZE_NUMBER_INT);
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
    $autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_SPECIAL_CHARS);
    $editora = filter_input(INPUT_POST, 'editora', FILTER_SANITIZE_SPECIAL_CHARS);

    $foto = converterBase64($_FILES['foto']);
    $arquivo = converterBase64($_FILES['arquivo']);    

    if(empty($arquivo) || empty($foto) || empty($titulo) || empty($autor) || empty($editora)) {
        $msg = "Por favor preencher todos os campos antes de enviar o formulário.";

    } else {
        if(fnAddLivro($arquivo, $foto, $titulo, $autor, $editora)) {
            $msg = "Sucesso ao cadastrar o livro.";

        } else {
        $msg = "Falha ao cadastrar o livro.";
        }   
    }


    $page = "formulario-cadastro-livro.php";

    setcookie('notify', $msg, (time() + 10), "/projeto/{$page}", 'localhost');

        header("location: {$page}");
        exit;