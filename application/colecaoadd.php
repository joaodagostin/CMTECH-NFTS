<?php	

	$conectar = mysql_connect('localhost','root','');
	$banco    = mysql_select_db("site");

	session_start('perfil.php');
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header("Location: login.php");
    }
	$logado = $_SESSION['email'];
    $conectar = mysql_connect('localhost','root','');
	$banco    = mysql_select_db("site");

    $sql = "SELECT nome , sobrenome, usuario, id FROM registro WHERE email='$logado'";
    $result = mysql_query($sql);
    $pessoa = mysql_fetch_assoc($result);

    $id = $_GET['id_colecao'];
    $sql2 = "SELECT nome_colecao, id_usuario from colecoes where id_colecao = '$id'";
    $result2 = mysql_query($sql2);
    $cole = mysql_fetch_assoc($result2);
    $idusu = $cole['id_usuario'];

    $sql3 = "SELECT usuario FROM registro WHERE id = '$idusu'";
    $result3 = mysql_query($sql3);
    $nome = mysql_fetch_assoc($result3);

    $sql4 = "SELECT Nome_nft, Valor_nft, Descricao_nft, Data_nft, Id_nft, foto_nft FROM cadastro_nft where id = '$idusu'";
    $result4 = mysql_query($sql4);
    $nfts = mysql_fetch_assoc($result4);


?>
<!DOCTYPE HTML>
<html>
<head>
<title>CMtech - As melhores NFTs em um só site!</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/csspolitica.css">
<link rel="shortcut icon" href="images/logopng.png" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<script src="js/modal.js" defer></script>
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>
    <!-- light-box -->
	<script type="text/javascript" src="js/jquery.fancybox.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />
   <script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

		});
	</script>
</head>
<body>
	<div class="header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="header-left">
					<div class="logo">
						<a href="index.php"><img src="images/logopng.png" width="60" height="50"/></a>
					 </div>
					<div class="menu">
						  <a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
						    <ul class="nav" id="nav">
						    	<li><a href="shop.php">Explorar</a></li>
						    	<li><a href="team.php">Time</a></li>
						    	<li><a href="experiance.php">Coleções</a></li>
								<li><a href="contact.php">Contato</a></li>	
						    	<li><a href="criar.php">Crie</a></li>								
								<div class="clear"></div>
							</ul>
							<script type="text/javascript" src="js/responsive-nav.js"></script>
					</div>		
										
	    			<div class="clear"></div>
	    		</div>
        	</div>
    	</div>
		</div>
	</div>
	<div class="conteudo">
    	<h1><?php echo $cole['nome_colecao'];?></h1>
        <h3>Coleção de   <?php echo $nome['usuario']; ?></h3>


        <button id="open-modal" class="btnadd" data-toggle="modal" data-target="#meuModal">+</button>
        <div id="fade" class="hide"></div>
        <div id="modal" class="hide">
        <div class="modal-header">
            <h2>Adicione sua NFT à coleção</h2>
            <button id="close-modal" class="closemod">Fechar</button>
        </div>
        <div class="modal-body">
            <p>
            <form action="colecaoadd.php" method="POST">
                <?php
                while ($nfts = mysql_fetch_assoc($result4)) {
                    echo ''.$nfts['Nome_nft'].'<input type="checkbox" name="'.$nfts['Nome_nft'].'" id="">';
                    echo '<br></br>';
                }
                ?>
                <input type="submit" value="Enviar">
            </form>
            </p>
            <p>
              <label></label>
            </p>
        </div>
        </div>
    </div>
<div class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<ul class="footer_box">
							<h4>Dúvidas</h4>
							<li><a href="centralatendimento.php">Central de Atendimento</a></li>
							<li><a href="politicadeprivacidade.php">Política de privacidade</a></li>
							<li><a href="perguntasfrequentes.php">Perguntas Frequentes</a></li>
							<li><a href="#">SAC</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<ul class="footer_box">
							<h4>Sobre</h4>
							<li><a href="sobrenos.php">Sobre nós</a></li>
							<li><a href="missao.php">Missão</a></li>
							<li><a href="#">Time</a></li>
							<li><a href="#">Catalogo</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<ul class="footer_box">
							<h4>Minha Conta</h4>
							<li><a href="#">Perfil</a></li>
							<li><a href="#">Favoritos</a></li>
							<li><a href="#">Minhas coleções</a></li>
							<li><a href="#">Configurações</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<ul class="footer_box">
							<h4>Newsletter</h4>
							<div class="footer_search">
				    		   <form>
				    			<input type="text" value="Enter your email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your email';}">
				    			<input type="submit" value="Enviar">
				    		   </form>
					        </div>
							<ul class="social">	
							  <li class="facebook"><a href="#"><span> </span></a></li>
							  <li class="twitter"><a href="#"><span> </span></a></li>
							  <li class="instagram"><a href="#"><span> </span></a></li>	
							  <li class="pinterest"><a href="#"><span> </span></a></li>	
							  <li class="youtube"><a href="#"><span> </span></a></li>										  				
						    </ul>
		   				</ul>
					</div>
				</div>
				<div class="row footer_bottom">
				    <div class="copy">
						<p>© 2022 by <a href="" target="_blank">cmtech</a></p>
		            </div>
   				</div>
			</div>
</div>
</div>
</body>	
</html>