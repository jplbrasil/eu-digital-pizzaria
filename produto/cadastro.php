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
					<td>
						<select name="imagem">
							<option value="a_moda.jpg">a_moda.jpg</option>
							<option value="calabresa.jpg">calabresa.jpg</option>
							<option value="carne_seca.jpg">carne_seca.jpg</option>
							<option value="champignon.jpg">champignon.jpg</option>
							<option value="frango_bolonhesa.jpg">frango_bolonhesa.jpg</option>
							<option value="frango_catupiry.jpg">frango_catupiry.jpg</option>
							<option value="marguerita.jpg">marguerita.jpg</option>
							<option value="milho_bacon.jpg">milho_bacon.jpg</option>
							<option value="mussarela.jpg">mussarela.jpg</option>
							<option value="palmito.jpg">palmito.jpg</option>
							<option value="portuguesa.jpg">portuguesa.jpg</option>
							<option value="quatro_queijos.jpg">quatro_queijos.jpg</option>
						</select>
					</td>
				</tr>

				<tr>
					<td>Ingredientes</td>
					<td><input type="text" name="ingredientes"></td>
				</tr>

				<tr>
					<td>Tamanho</td>
					<td>
						<input type="radio" name="tamanho" value="Gigante">Gigante</input>
						<input type="radio" name="tamanho" value="Grande">Grande</input>
						<input type="radio" name="tamanho" value="Média">Média</input>
						<input type="radio" name="tamanho" value="Pequena">Pequena</input>
					</td>	
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
		
		<center>
		<a href="../index.php">Voltar para a Homepage</a>
		</center>

		<br> <hr> <br>
		
		<table border=1 align="center">
	
			<tr>
				<th>Sabor</th>
				<th>Tamanho</th>
				<th>Preco</th>
				<th>Ação</th>
			</tr>
			
			<?php
			
				$sql = "SELECT id, sabor, tamanho, preco FROM pizza";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

					while($row = $result->fetch_assoc()) {
						echo "<tr>\n";
						echo "<td>" . $row["sabor"] . "</td>\n";
						echo "<td>" . $row["tamanho"] . "</td>\n";
						echo "<td>" . $row["preco"] . "</td>\n";
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

