<html>

	<head>
		<title> ..:: Pizzaria Brasileira ::.. </title>
	</head>

	<body>

		<br>
		
		<center>

		<hr>
		<h2>Pizzaria Brasileira - Cadastro de Clientes</h2>
		<hr>		
		
		</center>
		
		<br>

		<center>
		<?php

			session_start();
			echo strtok($_SESSION['cliente']," ") . ", sua sessão foi encerrada.\n";
			echo "<BR><BR>\n";			
			echo "Esperamos que volte novamente em breve!\n";
			session_unset();
			session_destroy();
		
		?>
		</center>
		
		<br>
		
		<center>
		<a href="../index.php">Voltar para a Homepage</a>
		</center>
				
	</body>

</html>

