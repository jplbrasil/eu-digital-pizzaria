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
		<h2>Pizzaria Brasileira - Cadastro de Produtos</h2>
		<hr>		
	
		<?php

			$sql = "INSERT INTO produto (titulo, categoria, imagem, descricao, preco) VALUES (";
			$sql .= "'". $_REQUEST['titulo'] . "'";
			$sql .= ", '". $_REQUEST['categoria'] . "'";
			$sql .= ", '". $_REQUEST['imagem'] . "'";
			$sql .= ", '". $_REQUEST['descricao'] . "'";
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

