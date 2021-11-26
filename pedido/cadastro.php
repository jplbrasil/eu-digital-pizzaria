<?php
	require("../banco_dados.php");
?>

<html>

	<body>
	
		<center>
		<h2>Cadastro de Pedidos</h2>
		</center>
		
		<table border=1 align="center">
	
			<tr>
				<th>Id do Pedido</th>
				<th>Data</th>
				<th>Hora</th>
				<th>Id Cliente</th>
				<th>Tipo de Pagamento</th>
				<th>Tipo de Entrega</th>
				<th>Valor dos Produtos</th>
				<th>Valor do Frete</th>
				<th>Valor Total</th>
				<th>Status</th>
				<th>Ação</th>
			</tr>
			
			<?php
			
				$sql = "SELECT * FROM pedido";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

					while($row = $result->fetch_assoc()) {
						echo "<tr>\n";
						echo "<td>" . $row["id"] . "</td>\n";
						echo "<td>" . $row["data"] . "</td>\n";
						echo "<td>" . $row["hora"] . "</td>\n";
						echo "<td>" . $row["id_cliente"] . "</td>\n";
						echo "<td>" . $row["tipo_pagamento"] . "</td>\n";
						echo "<td>" . $row["tipo_entrega"] . "</td>\n";
						echo "<td>" . $row["valor_produtos"] . "</td>\n";
						echo "<td>" . $row["valor_frete"] . "</td>\n";
						echo "<td>" . $row["valor_total"] . "</td>\n";
						echo "<td>" . $row["status"] . "</td>\n";
						echo "<td><a href='excluir.php?id=" . $row["id"] . "'>&nbsp &nbsp Excluir &nbsp &nbsp</a></td>\n";
						echo "</tr>\n";
					}
			
				} else {
					//echo "0 results";
				}
			
				$conn->close();
			?>

		</table>
				
	</body>

</html>