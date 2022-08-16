<?php 
    include('config.php');
    

?>

<!doctype html>

<html lang="pt_BR">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário Cadastro Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>

  <body>
  

    <div class="col-6 offset-3">

        <fieldset>

            <legend>Cadastro de Livros</legend>
            <form action="registraLivro.php" method="post" class="form" enctype="multipart/form-data">

                <div class="card col-4 offset-4">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Foto da capa" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Foto da capa</text>
                    </svg>
                </div>                

                <div class="mb-3 form-group">

                    <label for="fotoId" class="form-label">Imagem da capa</label>
                    <input type="file" name="foto" id="fotoId" class="form-control" placeholder="Informe o nome" required>
                    <div id="helperFoto" class="form-text">Importe a imagem</div>

                </div>
                <div class="mb-3 form-group">

                    <label for="arquivoId" class="form-label">Arquivo do Livro</label>
                    <input type="file" name="arquivo" id="arquivoId" class="form-control" placeholder="Selecione o arquivo" required>
                    <div id="helperArquivo" class="form-text">Importe o Arquivo</div>

                </div>

                <div class="mb-3 form-group">

                    <label for="tituloId" class="form-label">Título</label>
                    <input type="text" name="titulo" id="tituloId" class="form-control" placeholder="Informe o título" required>
                    <div id="helperTitulo" class="form-text">Informe o título completo</div>

                </div>

                <div class="mb-3 form-group">

                    <label for="autorId" class="form-label">Autor</label>
                    <input type="text" name="autor" id="autorId" class="form-control" placeholder="Informe o autor" required>
                    <div id="helperAutor" class="form-text">Informe o nome do autor</div>

                </div>

                <div class="mb-3 form-group">

                    <label for="editoraId" class="form-label">Editora</label>
                    <input type="text" name="editora" id="editoraId" class="form-control" placeholder="Informe a editora" required>
                    <div id="helperEditora" class="form-text">Informe a Editora</div>

                </div><br>
               
                <button type="submit" class="btn btn-dark">Enviar</button>

                <div id="notify" class="form-text text-capitalize fs-4"><?= isset($_COOKIE['notify']) ? $_COOKIE['notify'] : '' ?></div> 

            </form>

        </fieldset>

    </div>

    <?php include("rodape.php"); ?>
    <script src="js/base64.js"></script>
  </body>

</html>