<?php

    require_once('repository/ClienteRepository.php');
    require_once('util/base64.php');
    include('config.php');
    session_start(); //é melhor colocar o start no inicio pois, ela fica antes de qualquer inicialização de código

    $id = filter_input(INPUT_POST, 'idCliente', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $cpf = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_NUMBER_INT);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);
    $contato = filter_input(INPUT_POST, 'contato', FILTER_SANITIZE_NUMBER_INT);

    $foto = converterBase64($_FILES['foto']);

    if(fnUpdateCliente($id, $foto, $nome, $email, $senha, $cpf, $contato)) {
        $msg = "Sucesso ao cadastrar o cliente.";
    } else {
        $msg = "Falha ao cadastrar o cliente.";
    }
    
    $_SESSION['id'] = $id;    
    $page = "formulario-edita-cliente.php";
    setcookie('notify', $msg, (time() + 10), "/aula06/loja/{$page}", 'localhost');
    header("location: {$page}?id=$id");
    exit;