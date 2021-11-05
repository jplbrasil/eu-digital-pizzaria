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
		<h1>Pizzaria Brasileira - Cadastro de Produtos</h1>
		<hr>		
	
		<?php

			$sql = "INSERT INTO pizza (sabor, imagem, ingredientes, tamanho, preco) VALUES (";
			$sql .= "'". $_REQUEST['sabor'] . "'";
			$sql .= ", '". $_REQUEST['imagem'] . "'";
			$sql .= ", '". $_REQUEST['ingredientes'] . "'";
			$sql .= ", '". $_REQUEST['tamanho'] . "'";
			$sql .= ", '". $_REQUEST['preco'] . "'";
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

