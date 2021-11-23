<?php
	require("../banco_dados.php");
?>

<html>

	<head>
		<title> ..:: Pizzaria Brasileira ::.. </title>
	</head>

	<body>

		<br>
		
		<center>

		<hr>
		<h2>Pizzaria Brasileira - Configuração</h2>
		<hr>		
		
		</center>
		
		<br>

		<center>
		<?php
		
			if( (MD5($_REQUEST['login']) == "63a9f0ea7bb98050796b649e85481845") && (MD5($_REQUEST['senha']) == "7b24afc8bc80e548d66c4e7ff72171c5") ) {
				session_start();
				$_SESSION['configurador'] = "Configurador";
				echo "Sessão de configurador iniciada.\n";
			}
				
			else
				echo "Login ou senha incorretos.\n";
		
		?>
		</center>
		
		<br>
		
		<center>
		<a href="painel.php">Voltar ao Painel de Configuração</a>
		</center>
				
	</body>

</html>

