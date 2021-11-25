<?php
	require("../banco_dados.php");
?>

<html>

	<body>
		
		<center>

		<h2>Cadastro de Pedidos</h2>	

		<br>
		
		<?php

			$sql = "DELETE FROM pedido WHERE id = '" . $_REQUEST['id'] . "'";

			if ($conn->query($sql) === TRUE)
				echo "Pedido excluído com sucesso!";
			else
				echo "Falha ao excluir pedido: " . $sql . "<br>" . $conn->error;

			echo "<BR>\n";
			
			$sql = "DELETE FROM itens_pedido WHERE id_pedido = '" . $_REQUEST['id'] . "'";

			if ($conn->query($sql) === TRUE)
				echo "Itens do pedido excluídos com sucesso!";
			else
				echo "Falha ao excluir itens do pedido: " . $sql . "<br>" . $conn->error;
			
			$conn->close();
			
		?>
		
		<br> <br>

		<a href="cadastro.php">Voltar</a>

		</center>

	</body>

</html>

