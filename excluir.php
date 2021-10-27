<html>

	<head>
		<title> ..:: Pizzaria Brasileira ::.. </title>
	</head>

	<body>

		<br>
		
		<center>

		<hr>
		<h1>Pizzaria Brasileira - Cadastro de Produtos</h1>
		<hr>		
	
		<?php
			/* Dados para conexao em base de dados local
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "pizzaria";
			//*/

			///* Dados para conexao 'a base de dados da nuvem Heroku, aplicativo eu-digital-pizzaria
			$servername = "us-cdbr-east-04.cleardb.com";
			$username = "bff01010138ab1";
			$password = "e04e9d48";
			$dbname = "heroku_264338b10d713e0";
			//*/
				
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
				die("Erro na conexão com banco de dados: " . $conn->connect_error . "\n");
			}
			//echo "Conexão com o banco de dados realizada com sucesso! (base de dados = " . $dbname . ")\n";

			$sql = "DELETE FROM pizza WHERE id = '" . $_REQUEST['id'] . "'";

			if ($conn->query($sql) === TRUE)
				echo "Produto excluído com sucesso!";
			else
				echo "Falha ao incluir produto: " . $sql . "<br>" . $conn->error;

			$conn->close();
			
		?>
						
		<br> <br>
		
		<center>
		<a href="cadastro.php">Voltar para a tela de Cadastro</a>
		</center>

	</body>

</html>

