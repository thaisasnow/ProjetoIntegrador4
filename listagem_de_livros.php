<?php 

    include('config.php');

    require_once('repository/LivroRepository.php');
    $titulo = filter_input(INPUT_GET, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);

?>

<!doctype html>

<html lang="pt_BR">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listagem de livros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>

  <body>
    

    <div class="col-6 offset-3">

        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Editora</th>
                    <th>Data Adição </th>
                    <th colspan="2">Gerenciar</th>

                </tr>
            </thead>

            <tbody>
                <?php foreach(fnLocalizaLivroPorNome($titulo) as $livro): ?> 

                    <tr>
                        <td><?= $livro->id ?></td>
                        <td><?= $livro->titulo ?></td>
                        <td><?= $livro->autor ?></td>
                        <td><?= $livro->editora ?></td>
                        <td><?= $livro->created_at ?></td>
                        <?php if($_SESSION['login']->id==2){

                        ?>
                        <td><a href="#" onclick="gerirUsuario(<?= $membro->id ?>, 'edit');">Editar</a></td>
                        <td><a href="#" onclick="return confirm('Deseja realmente excluir?') ? gerirUsuario(<?= $membro->id ?>, 'del') : '';" href="#">Excluir</a></td>
                        <?php } else{
                        "";
                        }  
                        ?>



                    </tr>

                <?php endforeach; ?> 

            </tbody>
    
            <?php if(isset($notificacao)) : ?>

            <tfoot>
                <tr>
                    <td colspan="7"><?= $_COOKIE['notify'] ?></td>
                </tr>
            </tfoot>

            <?php endif; ?>

        </table>
    </div>
        <?php include("rodape.php"); ?>

        <script>

            window.post = function(data) { 
                return fetch(
                    'setSession.php', 
                    {
                        method: 'POST', 
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify(data)
                    }
                )
                .then(response => { 
                    
                    console.log(`Requisição completa! Resposta:`, response); 
                });

            }

            function gerirUsuario(id, action) {

                post({data : id});

                url = 'excluirLivro.php';
                if(action === 'edit')
                    url = 'formulario-edita-livro.php';

                window.location.href = url; 
            }
        </script>

  </body>

</html>