<?php
	require("../banco_dados.php");
?>

<html>

	<body>

		<center>
		
		<h2>Cadastro de Produtos</h2>
		
		<br>		
	
		<?php

			$sql = "DELETE FROM produto WHERE id = '" . $_REQUEST['id'] . "'";

			if ($conn->query($sql) === TRUE)
				echo "Produto excluído com sucesso!";
			else
				echo "Falha ao excluir produto: " . $sql . "<br>" . $conn->error;

			$conn->close();
			
		?>

		<br> <br>
		
		<a href="cadastro.php">Voltar</a>
		
		</center>

	</body>

</html>

