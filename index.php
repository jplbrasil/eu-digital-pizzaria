<?php
	require("banco_dados.php");
?>

<html>

	<head>
		<title> ..:: Pizzaria Brasileira ::.. </title>
	</head>

	<body>

		<br>
		
		<center>

		<img src="imagens/principal.jpg"> 
		
		<br>
		<br>
		
		<hr>
		<h2>Bem vindo à Pizzaria Brasileira</h2>
		<hr>		
		
		<!--
		<h3>Escolha um de nossos deliciosos sabores e faça seu pedido!</h3>
		-->
		
		<p>Nossas pizzas são preparadas com ingredientes super selecionados e possuem um sabor sem igual! Confira!</p>
	
		</center>
		
		<br>
		
		<div id="produtos" style="overflow:auto;width:100%;height:200px">
		
		<table border=0 align="center">
	
			<thead>
	
			<tr bgcolor="#DDDDDD">
				<th>Sabor</th>
				<th>Imagem</th>				
				<th>Ingredientes</th>
				<th>Tamanho</th>
				<th>Preço (R$)</th>
			</tr>
			
			</thead>
			
			<tbody>
			
			<?php

				$sql = "SELECT * FROM produto";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

					while($row = $result->fetch_assoc()) {
						echo "<tr>\n";
						echo "<td align='center'>" . $row["sabor"] . "</td>\n";
						echo "<td align='center'>" . "<img width='50%' src='imagens/sabores/". $row["imagem"] . "'></td>\n";
						echo "<td align='center'>" . $row["ingredientes"] . "</td>\n";
						echo "<td align='center'>" . $row["tamanho"] . "</td>\n";
						echo "<td align='center'>" . $row["preco"] . "</td>\n";
						echo "</tr>\n";
					}
			
				} else {
					//echo "0 results";
				}
			
				$conn->close();
			?>

			</tbody>
			
		</table>
		
		<!-- fecha a div produtos -->
		</div>
				
		<br>
		
		<center>
		<p>Endereço: Rua Abcd Xyz, 900. Centro, Contagem. Telefone / WhatsApp: (31) 3333-4444</p>
		</center>
		
		<br>
		
		<center>
		<a href="produto/cadastro.php">Tela de Cadastro de Produtos</a>
		</center>

		<br>
		
		<center>
		<a href="cliente/cadastro.php">Tela de Cadastro de Clientes</a>
		</center>

	</body>

</html>

