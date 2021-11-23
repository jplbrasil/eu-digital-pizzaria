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

			session_start();
			echo "Sessão de configurador encerrada.\n";
			session_unset();
			session_destroy();
		
		?>
		</center>
		
		<br>
		
		<center>
		<a href="painel.php">Voltar ao Painel de Configuração</a>
		</center>
				
	</body>

</html>

