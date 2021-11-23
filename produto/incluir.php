<?php
	require("../banco_dados.php");
?>

<html>

	<body>

		<center>

		<h2>Cadastro de Produtos</h2>

		<br>
		
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
		
		<a href="cadastro.php">Voltar</a>
		
		</center>

	</body>

</html>

