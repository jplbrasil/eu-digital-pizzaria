<?php
	require("../banco_dados.php");
?>

<html>

	<body>
		
		<center>

		<h2>Cadastro de Clientes</h2>	

		<br>
		
		<?php

			$sql = "DELETE FROM cliente WHERE id = '" . $_REQUEST['id'] . "'";

			if ($conn->query($sql) === TRUE)
				echo "Cliente excluído com sucesso!";
			else
				echo "Falha ao excluir cliente: " . $sql . "<br>" . $conn->error;

			$conn->close();
			
		?>
		
		<br> <br>

		<a href="cadastro.php">Voltar</a>

		</center>

	</body>

</html>

