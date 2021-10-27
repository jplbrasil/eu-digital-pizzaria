<html>

	<head>
		<title> ..:: Pizzaria Brasileira ::.. </title>
	</head>

	<body>

		<br>
		
		<center>

		<hr>
		<h1>Bem vindo à Pizzaria Brasileira</h1>
		<hr>		
		
		<h2>Escolha um de nossos deliciosos sabores e faça seu pedido!</h2>
		
		<p>Nossas pizzas são preparadas com ingredientes super selecionados e possuem um sabor sem igual! Confira!</p>
	
		</center>
		
		<br>
		
		<table border=1 align="center">
	
			<tr bgcolor="#DDDDDD">
				<th>Sabor</th>
				<th>Ingredientes</th>
				<th>Gigante</th>
				<th>Grande</th>
				<th>Média</th>
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

				$sql = "SELECT * FROM pizza";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

					while($row = $result->fetch_assoc()) {
						echo "<tr>\n";
						echo "<td align='center'><b><br>". $row["sabor"] . "</b> <br><br> <img width='50%' src='imagens/sabores/". $row["imagem"] . "'> <br><br> </td>\n";
						echo "<td>" . $row["ingredientes"] . "</td>\n";
						echo "<td> R$ " . $row["preco_gigante"] . "</td>\n";
						echo "<td> R$ " . $row["preco_grande"] . "</td>\n";
						echo "<td> R$ " . $row["preco_media"] . "</td>\n";
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
		<p>Endereço: Rua Abcd Xyz, 900. Centro, Contagem. Telefone / WhatsApp: (31) 3333-4444</p>
		</center>
		
		<br>
		
		<center>
		<a href="cadastro.php">Tela de Cadastro de Produtos</a>
		</center>


	</body>

</html>

