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
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "pizzaria";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
				die("Erro na conexão com banco de dados: " . $conn->connect_error . "\n");
			}
			//echo "Conexão com o banco de dados realizada com sucesso! (base de dados = " . $dbname . ")\n";

			$sql = "INSERT INTO pizza (sabor, imagem, ingredientes, preco_gigante, preco_grande, preco_media) VALUES (";
			$sql .= "'". $_REQUEST['sabor'] . "'";
			$sql .= ", '". $_REQUEST['imagem'] . "'";
			$sql .= ", '". $_REQUEST['ingredientes'] . "'";
			$sql .= ", '". $_REQUEST['preco_gigante'] . "'";
			$sql .= ", '". $_REQUEST['preco_grande'] . "'";
			$sql .= ", '". $_REQUEST['preco_media'] . "'";
			$sql .= ")";

			if ($conn->query($sql) === TRUE)
				echo "Produto incluído com sucesso!";
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

