<html>

	<head>
		<title> ..:: Pizzaria Brasileira ::.. </title>
	</head>

	<body>

		<br>
		
		<center>

		<hr>
		<h1>Pizzaria Brasileira - Cadastro de Produtos</h1>
		<hr>		
		
		</center>
		
		<br>
		
		<form action="incluir.php">
	  
			<table border=1 align="center">
	
				<tr>
					<td>Sabor</td>
					<td><input type="text" name="sabor"></td>
				</tr>

				<tr>
					<td>Imagem</td>
					<td><input type="text" name="imagem"></td>
				</tr>

				<tr>
					<td>Ingredientes</td>
					<td><input type="text" name="ingredientes"></td>
				</tr>

				<tr>
					<td>Tamanho</td>
					<td><input type="text" name="tamanho"></td>
				</tr>

				<tr>
					<td>Preço (R$)</td>
					<td><input type="text" name="preco"></td>
				</tr>
			
			</table>
		
			<br>
		
			<center>
			<input type="submit" value="Cadastrar">
			</center>

		</form>

		<br>
		
		<table border=1 align="center">
	
			<tr>
				<th>Sabor</th>
				<th>Ação</th>
			</tr>
			
			<?php

				/* Dados para conexao em base de dados local
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "pizzaria";
				//*/

				///* Dados para conexao 'a base de dados da nuvem Heroku, aplicativo eu-digital-pizzaria
				$servername = "us-cdbr-east-04.cleardb.com";
				$username = "bff01010138ab1";
				$password = "e04e9d48";
				$dbname = "heroku_264338b10d713e0";
				//*/
				
				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);

				// Check connection
				if ($conn->connect_error) {
					die("Erro na conexão com banco de dados: " . $conn->connect_error . "\n");
				}
				//echo "Conexão com o banco de dados realizada com sucesso! (base de dados = " . $dbname . ")\n";

				$sql = "SELECT id, sabor FROM pizza";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

					while($row = $result->fetch_assoc()) {
						echo "<tr>\n";
						echo "<td>" . $row["sabor"] . "</td>\n";
						echo "<td><a href='excluir.php?id=" . $row["id"] . "'>&nbsp &nbsp Excluir &nbsp &nbsp</a></td>\n";
						echo "</tr>\n";
					}
			
				} else {
					//echo "0 results";
				}
			
				$conn->close();
			?>

		</table>
		
		<br>
		
		<center>
		<a href="index.php">Voltar para a Homepage</a>
		</center>
		
	</body>

</html>

