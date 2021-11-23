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
				<th>Nome</th>
				<th>Email</th>
				<th>Ação</th>
			</tr>
			
			<?php
			
				$sql = "SELECT id, nome, email FROM cliente";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

					while($row = $result->fetch_assoc()) {
						echo "<tr>\n";
						echo "<td>" . $row["nome"] . "</td>\n";
						echo "<td>" . $row["email"] . "</td>\n";
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

