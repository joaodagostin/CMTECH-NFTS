<?php 
error_reporting(0);
	session_start('perfil.php');
		$logado = $_SESSION['email'];
		$conectar = mysql_connect('localhost','root','');
		$banco    = mysql_select_db("site");
		$sql = "SELECT nome , sobrenome, usuario, id, fotoperfil FROM registro WHERE email='$logado'";
		$result = mysql_query($sql);
		$pessoa = mysql_fetch_assoc($result);
		$userid = $pessoa['id'];

$sql2 = "SELECT Nome_nft, Valor_nft, Descricao_nft, Data_nft, Id_nft, foto_nft FROM cadastro_nft";
$result2 = mysql_query($sql2);
$nfts = mysql_fetch_assoc($result2);
$oi = $nfts['Id_nft'];
$sql3 = "SELECT foto_nft FROM cadastro_nft WHERE $oi = 'Id_nft'"; 
$result3 = mysql_query($sql3);
$nftsfoto = mysql_fetch_assoc($result3);
$quantidade = sizeof($nfts);

if(!empty($_GET['search'])) {
	$data = $_GET['search'];
	$sql2 = "SELECT Nome_nft, Valor_nft, Descricao_nft, Data_nft, Id_nft, foto_nft FROM cadastro_nft where Nome_nft like '%$data%' or Valor_nft like '%$data%' ";
	$result2 = mysql_query($sql2);
}
else {
	$sql2 = "SELECT Nome_nft, Valor_nft, Descricao_nft, Data_nft, Id_nft, foto_nft FROM cadastro_nft";
	$result2 = mysql_query($sql2);
}

if((isset($_POST['submit']))) {
	$sql2 = "SELECT Nome_nft, Valor_nft, Descricao_nft, Data_nft, Id_nft, foto_nft FROM cadastro_nft ORDER BY Valor_nft DESC";
	$result2 = mysql_query($sql2);
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>CMtech - As melhores NFTs em um só site!</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="shortcut icon" href="images/logopng.png" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<script src="https://unpkg.com/web3@latest/dist/web3.min.js"></script>
<script>
	//const Web3 = require('web3');
	const web3 = new Web3('https://thrumming-muddy-glade.matic.discover.quiknode.pro/54aacde9f0c663d39a49f5e2ba7b398125bfb026/');
	web3.eth.getBlock('latest').then(answer => console.log(answer))
	web3.eth.getBlockNumber().then(blockNum => console.log(blockNum))
	console.log(web3.eth.getCoinbase())
</script>
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
	            <div class="header_right">
	    		  <!-- start search-->
				  <div class="search-box">
							<div id="sb-search" class="sb-search">
								<form onsubmit="searchData()">
									<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
									<input class="sb-search-submit" type="submit" value="">
									<span class="sb-icon-search"> </span>
								</form>
							</div>
						</div>
						<!----search-scripts---->
						<script src="js/classie.js"></script>
						<script src="js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
							var search = document.getElementById('search');
							function searchData()
							{
								window.location = 'shop.php?search'+search.value;
							}
						</script>
				    <ul class="icon1 sub-icon1 profile_img">
					 <li><a class="active-icon c1" href="login.php"> </a>
						<ul class="sub-icon1 list">
						   <div class="clear"></div>
						  <li class="list_img"><img class="imagem-perfil" src="<?php echo $pessoa['fotoperfil'] ?>"></li>
						  <li class="list_desc"><h4><a href="#"><?php echo $pessoa['usuario']; ?> </a></h4><span class="actual"></span></li>
						  <div class="login_buttons">
							 <div class="check_button"><a href="sair.php">Sair</a></div>
							 <div class="login_button"><a href="perfil.php">Perfil</a></div>
							 <div class="clear"></div>
						  </div>
						  <div class="clear"></div>
						</ul>
					 </li>
				   </ul>
		        <div class="clear"></div>
	       </div>
	      </div>
		 </div>
	    </div>
	  </div>
     <div class="main">
      <div class="shop_top">
		<div class="container">
			<div class="row shop_box-top">
				<h3>Filtrar:</h3>
				<select name="select" class="selectordem">
					<option value="maiscaro">Maior Valor</option>
					<option value="maisbarato" selected>Menor Valor</option>
					<option value="valor3">Valor 3</option>
					<input type="submit" class="btnfiltros">
				</select>
				<?php
					while ($nfts = mysql_fetch_assoc($result2)) {
						echo '<div class="col-md-3 shop_box"><a href="single.php?id='.$nfts['Id_nft'].'">';
						echo "<img src=".$nfts['foto_nft']." class='img-responsive2'/>";
						echo '<span class="new-box">';
						echo '</span>';
						echo '</span>';
						echo '<div class="shop_desc">';
						echo '<h3><a href="#">'.$nfts['Nome_nft'].'</a></h3>';
						echo '<p>'.$nfts['Descricao_nft'].'</p>';
						echo '<span class="actual">'.$nfts['Valor_nft'].' ETH<img src="images/ethereum (1).png" width="30px" height="30px" style="margin-left: 125px;"></span><br>';
						echo '<ul class="buttons">';
						echo '<li class="cart"><a href="#">Comprar</a></li>';
						echo '<li class="shop_btn"><a href="#">Ler mais</a></li>';
						echo '<div class="clear"> </div>';
						echo '</ul>';
						echo '</div>';
						echo '</a></div>';
					}
				?>
				</a></div>
			</div>
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
</body>	
</html>