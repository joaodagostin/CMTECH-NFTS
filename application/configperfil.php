<?php 

session_start('perfil.php');
	$logado = $_SESSION['email'];
    $conectar = mysql_connect('localhost','root','');
	$banco    = mysql_select_db("site");
    $sql = "SELECT nome , id, sobrenome, usuario, email, cpf, celular, sexo FROM registro WHERE email='$logado'";
    $result = mysql_query($sql);
    $pessoa = mysql_fetch_assoc($result);
    $id = $pessoa['id'];

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
<!--<script src="js/jquery.easydropdown.js"></script>-->
<!--start slider -->
<link rel="stylesheet" href="css/fwslider.css" media="all">
<script src="js/jquery-ui.min.js"></script>
<script src="js/fwslider.js"></script>
<!--end slider -->
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
<nav class="nav_tabs">
        <ul>
            <li>
                <input type="radio" id="tab1" class="rd_tab" name="tabs" checked>
                <label for="tab1" class="tab_label">Carteira</label>
                <div class="tab-content22">
                    <h2>Configurações Gerais</h2>
                    <article>
                        <form action="configperfil.php" method="POST" class="formpf">
                            <span>Usuário:<label></label></span><br>
                            <input type="text" name="usuario"><br><br>
                            <span>Digite a senha atual:<label></label></span><br>
                            <input type="password" name="senha"><br><br>
                            <span>Digite a nova senha:<label></label></span><br>
                            <input type="password" name="senha">
                        </form>
                    </article>
                </div>
            </li>
            <li>
                <input type="radio" name="tabs" class="rd_tab" id="tab2">
                <label for="tab2" class="tab_label">Geral</label>
                <div class="tab-content22">
                    <div class="contentnow">
                        <article>
                            <h2>Dados Pessoais</h2>
                            <span>Usuário:<label><?php echo "⠀⠀ "; echo $pessoa['usuario']; ?></label></span><br><br>
                            <span>Email:<label><?php echo "⠀⠀ "; echo $pessoa['email']; ?></label></span><br><br>
                            <span>CPF:<label><?php echo "⠀⠀ "; echo $pessoa['cpf']; ?></label></span><br><br>
                            <span>Sexo:<label><?php echo "⠀⠀ "; echo $pessoa['sexo']; ?></label></span><br>
                        </article>
                    </div>
                    <div class="alterar">
                        <h2>Alterar Dados</h2>
                            <article>
                                <form action="saveedit.php" method="POST" class="formpf">
                                <div class="register-bottom-grid">
                                    <span>Usuário:<label></label></span><br>
                                    <input type="text" name="usuario" value="<?php echo $pessoa['usuario']; ?>" required><br><br>
                                    <span>Digite a senha atual:<label></label></span><br>
                                    <input type="password" name="senhaatual" required><br><br>
                                    <span>Digite a nova senha:<label></label></span><br>
                                    <input type="password" name="senha" required><br><br>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" name="update" value="Enviar">
                                </div>
                                </form>
                                <script>
									if ( window.history.replaceState ) {
										window.history.replaceState( null, null, window.location.href );
									}
								</script>
                            </article>
                    </div>
                </div>
            </li>
            <li>
                <input type="radio" name="tabs" class="rd_tab" id="tab3">
                <label for="tab3" class="tab_label">Aparência</label>
                <div class="tab-content22">
                    <h2>Title 3</h2>
                    <article>
                        Integer at ligula eget turpis elementum ultrices eget quis tortor. Duis posuere lorem justo, ut malesuada tortor tempus a. Curabitur pellentesque ultricies consectetur. Maecenas diam lorem, hendrerit eget sem ut, tincidunt vulputate ipsum. In vel enim et erat sagittis eleifend vel eu nunc. In hac habitasse platea dictumst. Integer tincidunt, augue at posuere eleifend, lacus quam hendrerit risus, aliquam sollicitudin ligula tellus quis elit. Proin varius fringilla vehicula. Phasellus mollis sollicitudin orci, id fringilla magna volutpat non. Nullam sed luctus nisl. 
                    </article>
                </div>
            </li>
        </ul>
</nav>
</body>
</html>