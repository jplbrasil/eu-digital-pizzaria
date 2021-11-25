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
				<th>Id</th>
				<th>Ação</th>
			</tr>
			
			<?php
			
				$sql = "SELECT * FROM pedido";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

					while($row = $result->fetch_assoc()) {
						echo "<tr>\n";
						echo "<td>" . $row["id"] . "</td>\n";
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