<?php 
    require_once ('repository/LivroRepository.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<head>
    <title>Livraria Online</title>
    <link rel="stylesheet" href="css/estilo.css">
    
    <link rel="stylesheet" href="css/default.css" type="text/css" media="screen" />   
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />

    
    <link rel="stylesheet" href="css/menu.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/home.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/livreta.css" type="text/css" media="screen" />
    
   
	<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
    
      <meta name="viewport" content="width=device-width, initial-scale=1.0">  
      
</head>
<body>

<section class="container">
 
 <header class="topo">

      <div class="logo"> 
          <img src="logo.jpeg" width="160" height="140"/>
      </div>   <!-- Fim Logo-->

      
      <nav class="menu">

      <ul>
            <li> <a href="home.php">Home</a></li>
            <li> <a href="livros.php">Livros</a></li>
            <li> <a href="cliente.php">Cliente</a>
                <div class="sub-menu">
                    <ul>
                    <li><a href="formulario-cadastro-cliente.php">Cadastro</a></li>
                    <li><a href="listagem_de_clientes.php">Editar</a></li>
                
                    </ul>
                </div>


            </li>
            <li> <a href="listagem.php">Listagem</a>
                <div class="sub-menu">
                    <ul>
                    <li><a href="formulario-cadastro-livro.php">Cadastro</a></li>
                    <li><a href="listagem_de_livros.php">Listagem de Livros</a></li>
                
                    </ul>
                </div>
            </li>
            <li> <a href="faleConosco.php">Fale Conosco</a>
        </ul>

        

      </nav> <!-- Fim Menu-->




 </header> <!-- Fim Topo-->
    
  <div id="banner">
   
  <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <img src="images/banner1.jpeg" data-thumb="images/banner1.jpeg" alt="" title="Livraria" />
                <img src="images/banner2.jpeg" data-thumb="images/banner2.jpeg" alt="" title="Livraria" />
                <img src="images/banner3.jpeg" data-thumb="images/banner3.jpeg" alt="" title="Livraria" data-transition="slideInLeft" />
                
            </div>            
        </div>
    </div><!-- Fim banner-->

    <div id="anuncioproduto">

        Aqui você encontrará a maior variedade de livros.

    </div><!-- Fim Anúncio Produto-->   
</section>      
    <br>

    <div class="contents2">
        <form name="faleconosco">
            <fieldset class="grupo">
                <legend><h2>Fale Conosco!</h2></legend>
                <label>Informe o seu nome:</label>
                <input class="maior" type="text" name="nome" placeholder="Digite o seu nome completo" required maxlenght="50" >
                <br><br>

                <label>Informe o seu telefone:</label>
                <input type="text" name="tel" placeholder="(xx)xxxxx-xxxx" required maxlength="14" class="maior" onkeypress="mascara_tel(this);"> 
                <br><br>

                <label>Informe o seu e-mail:</label> <br>
                <input class="email" type="text" name="email" placeholder="Digite o seu e-mail" required  maxlength="50">
                <br><br>

                <label>Selecione o assunto desejado:</label>
                <select class="maior" name="assunto">
                    <option value="0">Selecione o assunto </option>
                    <option value="1">Mais Informações</option>
                    <option value="2">Sugestões</option>
                    <option value="3">Críticas</option>
                    <option value="4">Outros</option>
                </select>
                <br><br>

                <label>Deixe o seu recado aqui:</label>
                <br>
                <textarea class="maior" name="recado" rows="5" placeholder="Digite o seu recado" maxlength="500"></textarea>
                <br><br>
                <div class="botoes">
                <input type="submit" name="enviar" value="ENVIAR">
                <input type="reset" name="limpar" value="LIMPAR">
                </div>
                <br>


            </fieldset>
        </form>
    </div>





    <footer class="rodape">

&copy;Livraria Company 2022 
   
</footer> <!-- Fim Rodapé-->

</body>
</html>
<script type="text/javascript" src="js/funcao.js"></script>