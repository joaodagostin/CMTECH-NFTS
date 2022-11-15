<?php 
error_reporting(0);
session_start('perfil.php');
	$logado = $_SESSION['email'];
    $conectar = mysql_connect('localhost','root','');
	$banco    = mysql_select_db("site");
    $sql = "SELECT nome , sobrenome, usuario FROM registro WHERE email='$logado'";
    $result = mysql_query($sql);
    $pessoa = mysql_fetch_assoc($result);

?>
<!DOCTYPE HTML>
<html>
<head>
<title>CMtech - As melhores NFTs em um só site!</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/new.css">
<link rel="shortcut icon" href="images/logopng.png" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
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
						    	<li><a href="shop.php">Crie</a></li>								
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
    	<h1>CENTRAL DE ATENDIMENTO</h1>
		
	</div>    
	<div class="caixa">
		<h2>Suporte a vendas CMtech:</h2>
		<p> Através deste canal, você terá acesso a um suporte totalmente personalizado, para garantir que a sua compra seja a melhor escolha para você e para a sua necessidade!</p>
		<p>O canal pode ser utilizado para tirar todas as dúvidas sobre os produtos que deseja comprar, bem como receber orientações, sugestões e indicações, de acordo com o seu estilo pessoal.</p>
		<p>O serviço está disponível das 09:00h às 18:00h, através do telefone:</p>
		<p>1 - (48)99961-5398</p>
		<p>2 - (48)99829-2658</p>
		<p>Esperamos você lá!</p>
		<br>
		<p>*Este canal não deve ser utilizado para assuntos relacionados ao pós-venda.</p>
		
		<div class="util">
			<br>
			<br>
			<b>Essa resposta foi útil?</b>
			<br>
			<button class="Sim">
				<span>Sim</span>
			</button>
			<button class="Nao">
				<span>Não</span>
			</button>
		</div>
	</div>


</div>
</body>	
</html>