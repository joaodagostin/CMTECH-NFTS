<?php 
error_reporting(0);
session_start('perfil.php');
	$logado = $_SESSION['email'];
    $conectar = mysql_connect('localhost','root','');
	$banco    = mysql_select_db("site");
    $sql = "SELECT nome , sobrenome, usuario,fotoperfil FROM registro WHERE email='$logado'";
    $result = mysql_query($sql);
    $pessoa = mysql_fetch_assoc($result);

	if(isset($_POST['submit'])) 
	{
		$senha      = $_POST['senha'];
		$confirmar  = $_POST['confirmar'];
		$nome = $_POST['nome'];
		$sobrenome = $_POST['sobrenome'];
		$email = $_POST['email'];
		$cpf = $_POST['cpf'];
		$celular = $_POST['celular'];
		$sexo = $_POST['sexo'];
		$usuario = $_POST['usuario'];
		$sql2 = mysql_query("SELECT COUNT(*) FROM registro WHERE email = '$email'");
		$result2 = mysql_fetch_array($sql2);
		if((!empty($nome)) && (!empty($sobrenome)) && (!empty($email)) && (!empty($cpf)) && (!empty($celular)) && (!empty($sexo)) && (!empty($usuario)) && (!empty($senha)) && (!empty($confirmar))) 
		{
			if($result2[0] > 0) {
				echo  "<script>alert('Email já cadastrado!');</script>";
			} else {
			
				$sql = mysql_query("INSERT INTO registro(Nome,Sobrenome,Email,Cpf,Celular,Sexo,Usuario,Senha,Confirmar,bannerperfil,fotoperfil) VALUES ('$nome','$sobrenome','$email','$cpf','$celular','$sexo','$usuario','$senha','$confirmar','nada','nada')") or die (mysql_error());
				$resultado = mysql_query($sql);
				if ($resultado)
				{  echo "<script src='js/modal'></script>";  }
				else
				{  echo "<div class='modal'></div>"; }
			}
		}else 
		{
			echo  "<script>alert('Todos os campos devem ser preenchidos!');</script>";
		}
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
	  <div class="modal">
		
	  </div>
     <div class="main">
      <div class="shop_top">
	     <div class="container">
						<form action="register.php" method="POST"> 
								<div class="register-top-grid">
										<h3>Informações Pessoais</h3>
										<div>
											<span>Nome<label>*</label></span>
											<input type="text" name="nome"> 
										</div>
										<div>
											<span>Sobrenome<label>*</label></span>
											<input type="text" name="sobrenome"> 
										</div>
										<div>
											<span>Email<label>*</label></span>
											<input type="email" name="email"> 
										</div>
										<div>
											<span>CPF<label>*</label></span>
											<input type="text" id="cpf" name="cpf"> 
										</div>
										<div>
											<span>Celular<label>*</label></span>
											<input type="text" id="celular" name="celular"> 
										</div>
										<div>
											<span>Sexo<label>*</label></span>
											<select name="sexo" id="sexo">
												<option value="masculino">Masculino</option>
												<option value="feminino">Feminino</option>
												<option value="naoinformar">Prefiro não informar</option>
											</select>
										</div>
										<div class="clear"> </div>
										<div class="clear"> </div>
								</div>
								<div class="clear"> </div>
								<div class="register-bottom-grid">
										<h3>Informaçoes de login</h3>
										<div>
											<span>Usuário<label>*</label></span>
											<input type="text" name="usuario">
										</div>
										<div>
											<span>Senha<label>*</label></span>
											<input type="password" name="senha">
										</div>
										<div>
											<span>Confirmar senha<label>*</label></span>
											<input type="password" name="confirmar">
										</div>
										<a class="news-letter" href="#">
												<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Eu aceito receber novos emails</label>
										</a>
										<a class="news-letter" href="#">
												<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Eu declaro que li as Políticas de Privacidade.</label>
										</a>
										<div class="clear"> </div>
								</div>
								<div class="clear"> </div>
								<div class="enviar">
									<input type="submit" name="submit" id="submit" value="ENVIAR" style="color: #FFF;
																				font-family: 'Open Sans', sans-serif;
																				font-size: 0.95em;
																				font-weight: normal;
																				padding: 15px 40px;
																				text-transform: uppercase;
																				background: #9E8312;
																				display: inline-block;
																				-webkit-transition: all 0.3s ease-out;
																				-moz-transition: all 0.3s ease-out;
																				-ms-transition: all 0.3s ease-out;
																				-o-transition: all 0.3s ease-out;
																				transition: all 0.3s ease-out;
																				font-weight: 100;
																				border: none;
																				cursor: pointer;
																				outline: none;
																			}">
								</div>
								<!--<script src="js/regex.js"></script>-->
								<script>
									if ( window.history.replaceState ) {
										window.history.replaceState( null, null, window.location.href );
									}
								</script>
						</form>
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