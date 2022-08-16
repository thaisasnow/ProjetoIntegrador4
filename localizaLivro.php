<?php
    require_once('repository/LivroRepository.php');
    $titulo = filter_input(INPUT_POST, 'nomeLivro', FILTER_SANITIZE_SPECIAL_CHARS);

    header("location: listagem_de_livros.php?nome={$titulo}");
        exit;