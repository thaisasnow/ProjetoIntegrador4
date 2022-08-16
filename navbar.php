<?php 
    require_once ('repository/LivroRepository.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<head>
    <title>Livraria Online</title>
    
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
            <li> <a href="QuemSomos.php">Quem Somos</a></li>
            <li> <a href="cliente.php">Cliente</a>
                <div class="sub-menu">
                    <ul>
                    <li><a href="formulario-cadastro-cliente.php">Cadastro</a></li>
                    <li><a href="listagem_de_clientes.php">Editar</a></li>
                
                    </ul>
                </div>


            </li>
            <li> <a href="FaleConosco.php">Fale Conosco</a></li>

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

 
 
 
<footer class="rodape">

 &copy;Livraria Company 2022 
    
</footer> <!-- Fim Rodapé-->
      
	
</body>
</html>