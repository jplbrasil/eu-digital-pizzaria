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

			$sql = "DELETE FROM produto WHERE id = '" . $_REQUEST['id'] . "'";

			if ($conn->query($sql) === TRUE)
				echo "Produto excluído com sucesso!";
			else
				echo "Falha ao excluir produto: " . $sql . "<br>" . $conn->error;

			$conn->close();
			
		?>
						
		<br> <br>
		
		<center>
		<a href="cadastro.php">Voltar para a tela de Cadastro</a>
		</center>

	</body>

</html>

