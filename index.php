<?php
	require("banco_dados.php");
?>

<html>

	<head>
		<title> ..:: Pizzaria Brasileira ::.. </title>
	</head>

	<body>

		<center>
		<img src="imagens/principal.jpg"> 
		<br>
		<h2>Pizzaria Brasileira</h2>
				
		<?php
			
			session_start();
			
			if(isset($_SESSION['cliente'])) {
				echo "Olá, " . $_SESSION['cliente'] . " &nbsp <a href='cliente/logoff.php'>(sair)</a>\n";
				echo " &nbsp &nbsp <a href='pedido/carrinho.php'>(meu carrinho) <img width='2%' src='imagens/carrinho.png'> </a>\n";
			}
			else {

				echo "<form action='cliente/autenticar.php'>\n";
	  			echo "<table border=0>\n";		
				echo "<tr>\n";
				echo "<td><b>Entre com seu login de cliente</b> &nbsp </td>\n";
				echo "<td>E-mail: <input type='text' name='email'></td>\n";
				echo "<td>Senha: <td><input type='password' name='senha'></td>\n";
				echo "<td><input type='submit' value='Entrar'></td>\n";
				echo "<td><a href='cliente/cadastrar.php'>Ainda não sou cadastrado(a)</a></td>\n";
				echo "</tr>\n";
				echo "</table>\n";			
				echo "</form>\n";
			}
			
		?>
		
		<hr>		
		
		<h3>Escolha um de nossos deliciosos sabores e faça seu pedido!</h3>
		
		<p>Nossas pizzas são preparadas com ingredientes super selecionados e possuem um sabor sem igual! Confira!</p>
	
		</center>
		
		<br>
		
		<div id="produtos" style="overflow:auto;width:100%;height:200px">
		
		<table border=0 align="center">
	
			<thead>
	
			<tr bgcolor="#DDDDDD">
				<th>sabor</th>
				<th>imagem</th>				
				<th>ingredientes</th>
				<th>tamanho</th>
				<th>preço (R$)</th>
				
				<?php
					if(isset($_SESSION['cliente']))
						echo "<th>incluir no pedido</th>\n";
				?>
			</tr>
			
			</thead>
			
			<tbody>
			
			<?php

				$sql = "SELECT * FROM produto";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

					while($row = $result->fetch_assoc()) {
						
						//Esse form e' para permitir ao cliente incluir produtos no carrinho
						echo "<form action='pedido/carrinho.php'>\n";
						
						echo "<tr>\n";
						echo "<td align='center'>" . $row["sabor"] . "</td>\n";
						echo "<td align='center'>" . "<img width='50%' src='imagens/sabores/". $row["imagem"] . "'></td>\n";
						echo "<td align='center'>" . $row["ingredientes"] . "</td>\n";
						echo "<td align='center'>" . $row["tamanho"] . "</td>\n";
						echo "<td align='center'>" . $row["preco"] . "</td>\n";
					
						if(isset($_SESSION['cliente'])) {
							echo "<td align='center'>\n";
							echo "<input type='hidden' name='idProduto' value=" . $row["id"] . ">\n";
							echo "<input type='submit' value='Incluir'>\n";
							echo "</td>\n";
						}
						
						echo "</tr>\n";
						
						echo "</form>\n";
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
		<a href="produto/cadastro.php">Cadastro de Produtos</a>
		</center>

		<br>
		
		<center>
		<a href="cliente/cadastro.php">Cadastro de Clientes</a>
		</center>

	</body>
	
</html>

