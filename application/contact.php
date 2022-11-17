<?php 

	$conectar = mysql_connect('localhost','root','');
	$banco    = mysql_select_db("site");
	error_reporting(0);
	session_start('perfil.php');
	$logado = $_SESSION['email'];
    $conectar = mysql_connect('localhost','root','');
	$banco    = mysql_select_db("site");
    $sql = "SELECT nome , sobrenome, usuario FROM registro WHERE email='$logado'";
    $result = mysql_query($sql);
    $pessoa = mysql_fetch_assoc($result);

	if(isset($_POST['submit'])) {


		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$assunto = $_POST['assunto'];
		$mensagem = $_POST['mensagem'];

		$sql = mysql_query("INSERT INTO contato(Nome,Email,Assunto,Mensagem) VALUES ('$nome','$email','$assunto','$mensagem')");
		$resultado = mysql_query($sql);
		if ($resultado)
		{  echo  "<script>alert('Todos os campos devem ser preenchidos!');</script>";  }
		else
		{  echo  "<script>alert('Sucesso! Entraremos em contato em breve.');</script>"; }
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
								<form>
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
						</script>
						<!----//search-scripts---->
					<ul class="icon1 sub-icon1 profile_img">
					 <li><a class="active-icon c1" href="login.php"> </a>
						<ul class="sub-icon1 list">
						   <div class="clear"></div>
						  <li class="list_img"><img src="images/1.jpg" alt=""/></li>
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
			<div class="row">
				<div class="col-md-7">
				  <div class="map">
					<img src="images\cm.png" alt="">
				  </div>
				</div>
				<div class="col-md-5">
					<p class="m_8">Para obter informações sobre um pedido realizado pelo site, acesse a página meus nft's. Voce também pode entrar em contato pelo número (48) 0000-0000 ou acessar a Ajuda para obter mais detalhes.</p>
					<div class="address">
						   		<p>Brasil</p>
				   		<p>Telefone:(48) 0000-0000</p>
				 	 	<p>Email: <span>suporteCMtech@gmail.com</span></p>
				   </div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 contact">
				  <form method="post" action="contact.php">
					<div class="to">
                     	<input type="text" name="nome" class="text" value="Nome" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nome';}">
					 	<input type="text" name="email" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
					 	<input type="text" name="assunto" class="text" value="Assunto" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Assunto';}">
					</div>
					<div class="text">
	                   <textarea name="mensagem" value="Mensagem:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Mensagem';}">Mensagem:</textarea>
	                   <div class="form-submit">
			           <input name="submit" type="submit" id="submit" value="Enviar"><br>
			           </div>
	                </div>
	                <div class="clear"></div>
                   </form>
				   <script>
						if ( window.history.replaceState ) {
							window.history.replaceState( null, null, window.location.href );
						}
				   </script>
			     </div>
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