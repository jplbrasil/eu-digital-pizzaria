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
		<h2>Pizzaria Brasileira - Cadastro de Clientes</h2>
		<hr>		
		
		</center>
		
		<br>
		
		<form action="incluir.php">
	  
			<table border=1 align="center">
	
				<tr>
					<td>Nome</td>
					<td><input type="text" name="nome"></td>
				</tr>

				<tr>
					<td>E-mail</td>
					<td><input type="text" name="email"></td>
				</tr>

				<tr>
					<td>Endereço</td>
					<td><input type="text" name="endereco"></td>
				</tr>

				<tr>
					<td>Senha</td>
					<td><input type="password" name="senha"></td>
				</tr>
			
			</table>
		
			<br>
		
			<center>
			<input type="submit" value="Cadastrar">
			</center>

		</form>

		<br>
		
		<center>
		<a href="../index.php">Voltar para a Homepage</a>
		</center>

		<br> <hr> <br>
		
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

