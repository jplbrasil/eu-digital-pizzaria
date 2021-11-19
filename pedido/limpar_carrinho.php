<html>

	<head>
		<title> ..:: Pizzaria Brasileira ::.. </title>
	</head>

	<body>

		<br>
		
		<center>

		<hr>
		<h2>Pizzaria Brasileira - Carrinho</h2>
		<hr>		
		
		</center>
		
		<br>

		<center>
		<?php

			session_start();
			echo "Olá, " . strtok($_SESSION['cliente']," ") . ", todos os produtos foram retirados do seu carrinho!\n";
			unset($_SESSION["carrinho"]);		
		?>
		</center>
		
		<br>
		
		<center>
		<a href="../index.php">Voltar para a Homepage</a>
		</center>
				
	</body>

</html>

