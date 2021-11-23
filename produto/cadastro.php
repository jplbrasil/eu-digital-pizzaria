<?php
	require("../banco_dados.php");
?>

<html>

	<body>
		
		<center>
		<h2>Cadastro de Produtos</h2>	
		</center>
			
		<form action="incluir.php">
	  
			<table border=1 align="center">
	
				<tr>
					<td>Título</td>
					<td><input type="text" name="titulo"></td>
				</tr>

				<tr>
					<td>Categoria</td>
					<td>
						<select name="categoria">
							<option value="Bebidas">Bebidas</option>
							<option value="Entradas">Entradas</option>
							<option value="Massas">Massas</option>
							<option value="Pizzas">Pizzas</option>
							<option value="Sobremesas">Sobremesas</option>
						</select>
					</td>
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
							<option value="produto.png">Produto Genérico</option>
						</select>
					</td>
				</tr>

				<tr>
					<td>Descrição</td>
					<td><textarea name="descricao" rows=3 cols=60></textarea></td>
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

		<br> <hr> <br>
		
		<table border=1 align="center">
	
			<tr>
				<th>Título</th>
				<th>Categoria</th>
				<th>Preco</th>
				<th>Ação</th>
			</tr>
			
			<?php
			
				$sql = "SELECT id, titulo, categoria, preco FROM produto";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

					while($row = $result->fetch_assoc()) {
						echo "<tr>\n";
						echo "<td>" . $row["titulo"] . "</td>\n";
						echo "<td>" . $row["categoria"] . "</td>\n";
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

