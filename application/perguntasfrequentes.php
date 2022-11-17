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
    	<h1>PERGUNTAS FREQUENTES</h1>
		
	</div>    
	<div class="caixa2">
		<h2>COMO COMPRAR?</h2>
		<p>Você deverá conectar sua wallet(carteira) digital de criptomoedas e realizar o pagamento através de um link que será gerado automaticamente, após a confirmação da compra a respectiva NFT será sua.</p>
        <br>
		<h2>COMO VENDER?</h2>
		<p>Na sua conta, existe a opção "Criar" no qual você poderá fazer o upload da imagem da respectiva NFT que será vendida, além de colocar o título, a descrição e também estabelecer um preço em ETH (Ethereum).</p>
		<br>
		<h2>TAXAS DO SITE CMTECH</h2>
		<p>Nosso site trabalha na rede Polygon, a qual não existe nenhuma taxa para estar postando sua NFT para venda porém a cmtech detém 5% do valor de uma futura compra.</p>
		<br>
		<h2>COMO PROVAR QUE A NFT É MINHA?</h2>
		<p>
			No geral, qualquer pessoa pode copiar a imagem ou tirar uma captura de tela da sua NFT, porém só você terá o código gerado na blockchain, um código único.
		</p>
		<br>
		<h2>QUAL A DIFERENÇA ENTRE NFTS E CRIPTOMOEDAS?</h2>
		<p>
			Embora também façam parte da blockchain, os tokens não-fungíveis possuem uma finalidade diferente dos outros criptoativos. “O NFT é capaz de transformar qualquer foto, vídeo, áudio, música, pinturas ou qualquer outro item em um token único e que pode se valorizar com o passar do tempo. Já as criptomoedas são ativos fungíveis, ou seja, podem ser substituídos por outros da mesma espécie, qualidade e quantidade e ainda podem ser fracionadas”, explica Fabricio Tota, diretor de novos negócios do Mercado Bitcoin e colunista do E-Investidor.Se o investidor realizar uma transação em Bitcoin, por exemplo, ele pode receber de volta uma unidade da criptomoeda e continuar tendo o mesmo valor. Já o NFT de uma obra de arte não pode ser trocada por outra igual, pois só existe o quadro original.
		</p>
		<br>
		<h2>QUAIS AS VANTAGENS DESSE MERCADO?</h2>
		<p>
			Perceba que os NFTs estão absolutamente ligados ao mercado financeiro e, neste sentido, seus criadores recebem porcentagens das vendas realizadas, enquanto os vendedores ganham no momento da venda e os compradores podem, futuramente, comercializar a aquisição por valor maior.
		</p>
		<br>
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