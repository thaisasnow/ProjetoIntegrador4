<?php

    require_once('Connection.php');

    #CRUD
    function fnAddLivro($arquivo, $foto, $titulo, $autor, $editora) {

        $con = getConnection();

        #SQL injection
        $sql = "insert into livros (arquivo, foto, titulo, autor, editora) values (:pArquivo, :pFoto, :pTitulo, :pAutor, :pEditora)";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pArquivo", $arquivo);
        $stmt->bindParam(":pFoto", $foto);        
        $stmt->bindParam(":pTitulo", $titulo);
        $stmt->bindParam(":pAutor", $autor);
        $stmt->bindParam(":pEditora", $editora);


        return $stmt->execute();
    }

    function fnListLivros() {
        $con = getConnection();

        $sql = "select * from livros";

        $result = $con->query($sql);

        $lstLivros = array();
        while($livro = $result->fetch(PDO::FETCH_OBJ)) {
            array_push($lstLivros, $livro);            
        }
        return $lstLivros;
    }

    function fnLocalizaLivroPorNome($titulo) {
        $con = getConnection();

        $sql = "select * from livros where titulo like :pTitulo";

        $stmt = $con->prepare($sql);
        $stmt->bindValue(":pTitulo", "%{$titulo}%");

        if($stmt->execute()) {
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }     
    }
    function fnLocalizaLivroPorId($id) {
        $con = getConnection();

        $sql = "select * from livros where id = :pID";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);

        if($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        return null;
    }

    function fnUpdateLivro($id, $arquivo, $foto, $titulo, $autor, $editora) {

        $con = getConnection();

        $sql = "update livros set arquivo = :pArquivo, foto = :pFoto, titulo = :pTitulo, autor = :pAutor, editora = :pEditora where id = :pID";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        $stmt->bindParam(":pArquivo", $arquivo);
        $stmt->bindParam(":pFoto", $foto);
        $stmt->bindParam(":pTitulo", $titulo);
        $stmt->bindParam(":pAutor", $Autor);
        $stmt->bindParam(":pEditora", $editora);

        return $stmt->execute();

    }

    function fnDeleteLivro($id) {

        $con = getConnection();

        $sql = "delete from livros where id = :pID";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        
        return $stmt->execute();
        
    }
