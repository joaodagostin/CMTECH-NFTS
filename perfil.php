<?php 
error_reporting(0);
    session_start();
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header("Location: login.php");
    }

    $logado = $_SESSION['email'];
    $conectar = mysql_connect('localhost','root','');
	$banco    = mysql_select_db("site");
    $sql = "SELECT nome , sobrenome, usuario, fotoperfil, bannerperfil, id FROM registro WHERE email='$logado'";
    $result = mysql_query($sql);
    $pessoa = mysql_fetch_assoc($result);
    $idusers = $pessoa['id'];

    $sql2 = "SELECT Nome_nft, Valor_nft, Descricao_nft, Data_nft, Id_nft, foto_nft FROM cadastro_nft where id = '$idusers'";
    $result2 = mysql_query($sql2);
    $nfts = mysql_fetch_assoc($result2);
    $oi = $nfts['Id_nft'];

    $sql3 = "SELECT foto_nft FROM cadastro_nft WHERE $oi = 'Id_nft'"; 
    $result3 = mysql_query($sql3);
    $nftsfoto = mysql_fetch_assoc($result3);
    $quantidade = sizeof($nfts);

    $sql4 = "SELECT id_colecao, nome_colecao, foto_colecao FROM colecoes WHERE id_usuario = '$idusers'";
    $result4 = mysql_query($sql4) or die(mysql_error());
    $colecao = mysql_fetch_assoc($result4);

    if(isset($_POST['submit'])) {
        if(isset($_FILES['fotoperfil'])) {
                
            $extensao = $_FILES['fotoperfil'];
            $extensao2 = $_FILES['bannerperfil'];
            $diretorio = "upload/";

            $novonome = $diretorio.$extensao['name'];
            $novonome2 = $diretorio.$extensao2['name'];
            
            move_uploaded_file($extensao['tmp_name'],$novonome);
            move_uploaded_file($extensao2['tmp_name'],$novonome2);
            $sql2 = mysql_query("UPDATE registro set fotoperfil = '$novonome', bannerperfil = '$novonome2' where email='$logado'") or die (mysql_error());
            $result = mysql_query($sql2);
        }
    }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>CMtech - As melhores NFTs em um só site!</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/csspolitica.css"/>
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
     <script src="js/modal.js" defer></script>
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
						  <li class="list_desc"><h4><a href="perfil.php"><?php echo $pessoa['usuario']; ?> </a></h4><span class="actual"></span></li>
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
<div class="banner">
        <form action="perfil.php" method="post" enctype="multipart/form-data">
                <label class="picture" for="picture__input" tabIndex="0">
                    <span class="picture__image"><img class="" src="fundotop.png"></span>
                </label>

                <input name="submit" id="btslv" value="Salvar Alterações" type="submit"></input>
                <a href="configperfil.php"><img id="config" src="images/engrenagem.png" alt=""></a>
                <a href=""><img id="config" src="images/btcompartilhar.png" alt=""></a>
                <script type="text/javascript">
                    const inputFile = document.querySelector("#picture__input");
                    const pictureImage = document.querySelector(".picture__image");
                    const pictureImageTxt = "";
                    pictureImage.innerHTML = pictureImageTxt;

                    inputFile.addEventListener("change", function (e) {
                    const inputTarget = e.target;
                    const file = inputTarget.files[0];

                    if (file) {
                        const reader = new FileReader();

                        reader.addEventListener("load", function (e) {
                            const readerTarget = e.target;

                            const img = document.createElement("img");
                                img.src = readerTarget.result;
                                img.classList.add("picture__img");

                                pictureImage.innerHTML = "";
                                pictureImage.appendChild(img);
                        });

                        reader.readAsDataURL(file);
                    } else {
                        pictureImage.innerHTML = pictureImageTxt;
                    }
                    });
                </script>
            <div class="fotoperfil">
                <label class="picture2" for="picture__input2" tabIndex="0">
                    <span class="picture__image2"><img class="ftperfil" src="<?php echo $pessoa['fotoperfil'] ?>"></span>
                    
                </label>

                <input type="file" name="fotoperfil" id="picture__input2">
                <script type="text/javascript">
                    const inputFile = document.querySelector("#picture__input2");
                    const pictureImage = document.querySelector(".picture__image2");
                    const pictureImageTxt = "";
                    pictureImage.innerHTML = pictureImageTxt;

                    inputFile.addEventListener("change", function (e) {
                    const inputTarget = e.target;
                    const file = inputTarget.files[0];

                    if (file) {
                        const reader = new FileReader();

                        reader.addEventListener("load", function (e) {
                            const readerTarget = e.target;

                            const img = document.createElement("img");
                                img.src = readerTarget.result;
                                img.classList.add("picture__img2");

                                pictureImage.innerHTML = "";
                                pictureImage.appendChild(img);
                        });

                        reader.readAsDataURL(file);
                    } else {
                        pictureImage.innerHTML = pictureImageTxt;
                    }
                    });
                </script>
        </form>
        </div>
        <script>
				if ( window.history.replaceState ) {
					window.history.replaceState( null, null, window.location.href );
				}
		</script>
</div>
<div class="nomeusuario">
    <h2><?php echo $pessoa['usuario']; ?></h2>
</div>
<div class="conteudonft">
    <nav class="nav_tabs">
        <ul>
            <li>
                <input type="radio" id="tab1" class="rd_tab" name="tabs" checked>
                <label for="tab1" class="tab_label">NFTs</label>
                <div class="tab-content">
                    <h2>Minhas NFT's</h2>
                    <article>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In interdum, felis sed feugiat tristique, massa nisl pretium ligula, vel finibus risus lacus at mauris. Proin vel mollis augue. Sed non auctor ipsum, congue facilisis diam. Proin sed enim odio. Ut libero mi, luctus sit amet tincidunt a, ullamcorper sit amet ex. Duis faucibus condimentum lectus, id accumsan diam posuere eu. Cras eu blandit dui, vitae lacinia velit. Aliquam gravida massa a velit pulvinar, ut placerat sem tristique. Vivamus dictum, quam nec pharetra iaculis, risus velit dapibus nunc, quis lobortis sapien ligula mollis nunc. Praesent elementum rutrum tincidunt. Phasellus at lacinia lectus.
                    </article>
                </div>
            </li>
            <li>
                <input type="radio" name="tabs" class="rd_tab" id="tab2">
                <label for="tab2" class="tab_label">Criados</label>
                <div class="tab-content">
                    <h2>Minhas NFT's criadas</h2>
                    <article>
                        <?php
                        while ($nfts = mysql_fetch_assoc($result2)) {
                            echo '<div class="col-md-3 shop_box"><a href="single.php?id='.$nfts['Id_nft'].'">';
                            echo "<img src=".$nfts['foto_nft']." class='img-responsive2'/><div class='img_section magnifier2'><div class='img_section_txt2'>".$nfts['Nome_nft']."</div></div>";
                            echo '<span class="new-box">';
                            echo '</span>';
                            echo '</span>';
                            echo '<div class="shop_desc2">';
                            echo '<ul class="buttons">';
                            echo '<li class="cart"></li>';
                            echo '<li class="shop_btn"></li>';
                            echo '<div class="clear"> </div>';
                            echo '</ul>';
                            echo '</div>';
                            echo '</a></div>';
                        }
                        ?>
                    </article>
                </div>
            </li>
            <li>
                <input type="radio" name="tabs" class="rd_tab" id="tab3">
                <label for="tab3" class="tab_label">Coleções</label>
                <div class="tab-content">
                    <h2>Minhas Coleções</h2>
                    <article>
                        <?php 
                            while ($colecao = mysql_fetch_assoc($result4)) {
                                echo '<div class="col-md-4 team1">';
                                echo '<div class="img_section magnifier2">';
                                echo "<a href='colecaoadd.php?id_colecao=".$colecao['id_colecao']."' class='fancybox' data-fancybox-group='gallery' title='Lorem ipsum dolor sit amet'>";
                                echo "<img src=".$colecao['foto_colecao']." class='img-responsive5'><div class='img_section magnifier2'><div class='img_section_txt3'>".$colecao['nome_colecao']."</div></div><span> </span>";
                                echo "</a></div>";
                                echo "</div>";
                            }
                        ?>
                    </article>
                </div>
            </li>
        </ul>
    </nav>
</div>
</head>