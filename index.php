<?php
	require("banco_dados.php");
?>

<html>

	<head>
		<title> ..:: Pizzaria Brasileira ::.. </title>
	</head>

	<body>

		<center>
		<!-- <img src="imagens/principal.jpg">
		<br>
		-->
		<h1>Pizzaria Brasileira</h1>
				
		<?php
			
			session_start();
			
			if(isset($_SESSION['cliente'])) {
				echo "Olá, " . strtok($_SESSION['cliente']," ") . " &nbsp <a href='cliente/logoff.php'>sair</a>\n";
				echo " &nbsp &nbsp <a href='pedido/carrinho.php'>meu carrinho <img width='2%' src='imagens/carrinho.png'> </a>\n";
			}
			else {

				echo "<form action='cliente/autenticar.php'>\n";
	  			echo "<table border=0>\n";		
				echo "<tr>\n";
				echo "<td><b>Entre com seu login de cliente</b> &nbsp </td>\n";
				echo "<td>E-mail: <input type='text' name='email'></td>\n";
				echo "<td>Senha: <td><input type='password' name='senha'></td>\n";
				echo "<td><input type='submit' value='Entrar'></td>\n";
				echo "<td> &nbsp &nbsp <a href='cliente/cadastrar.php'>Ainda não sou cadastrado(a)</a></td>\n";
				echo "</tr>\n";
				echo "</table>\n";			
				echo "</form>\n";
			}
			
		?>
		
		<hr>		
		
		<h3>Escolha um de nossos deliciosos sabores e faça seu pedido!</h3>
		
		<p>Nossas pizzas são preparadas com ingredientes super selecionados e possuem um sabor sem igual! Confira!</p>
	
		</center>
		
		<br> <br>

		<table border=1 align="center" style="width:80%">
		
			<tr>

				<td align='center' style='width:10%'>
				<a href='index.php?filtro=1&categoria=Todas'>Todos Produtos</a>
				</td>
			
				<?php
				
					$sql = "SELECT DISTINCT(categoria) FROM produto";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {

						while($row = $result->fetch_assoc()) {
					
							echo "<td align='center' style='width:10%'>\n";
							echo "<a href='index.php?filtro=1&categoria=" . $row["categoria"] . "'> ". $row["categoria"] . "</a>\n";
							echo "</td>\n";
						}
					}
				
				?>
			
			</tr>
		
		</table>
		
		
		<div id="produtos" style="overflow:auto;width:100%;height:400px">
		
		<table border=0 align="center" style="width:80%">
			
			<tbody>
			
			<?php

				if(!isset($_REQUEST["filtro"]))
					$sql = "SELECT * FROM produto";
				else {
					if($_REQUEST["categoria"] == "Todas")
						$sql = "SELECT * FROM produto";
					else
						$sql = "SELECT * FROM produto WHERE categoria = '" . $_REQUEST["categoria"] . "'";
				}
				
				$sql .= " ORDER BY categoria, produto";
				
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

					$colunas = 0;
				
					while($row = $result->fetch_assoc()) {
												
						if(($colunas % 3) == 0)
							echo "<tr>\n";
							
						$colunas ++;						
						
						echo "<td align='center' style='width:33%'>\n";
						echo "<br><br>\n";
						echo "<img width='40%' src='imagens/". $row["imagem"] . "'>\n";
						echo "<br><br>\n";
						echo "<b>" . $row["titulo"] . "</b>\n";
						echo "<br><br>\n";
						echo "<textarea rows=3 cols=50 readonly style='resize:none'>" . $row["descricao"] . "</textarea>\n";
						echo "<br><br>\n";
						printf("<b> R$ %01.2f </b>\n", $row["preco"]);

						//Esse form e' para permitir ao cliente incluir produtos no carrinho						
						if(isset($_SESSION['cliente'])) {
							echo "<br><br>\n";
							echo "<form action='pedido/carrinho.php'>\n";
							echo "<input type='hidden' name='idProduto' value='" . $row["id"] . "'>\n";
							echo "<input type='hidden' name='operacao' value='adicionar'>\n";
							echo "<input type='submit' value='incluir no meu carrinho'>\n";
							echo "</form>\n";
						}

						echo "</td>\n";

						if(($colunas % 3) == 0)
							echo "</tr>\n";
						
					}
					
					if(($colunas % 3) != 0)
						echo "</tr>\n";
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
		
		<!--
		
		<br>
		
		<center>
		<a href="produto/cadastro.php">Cadastro de Produtos</a>
		</center>

		<br>
		
		<center>
		<a href="cliente/cadastro.php">Cadastro de Clientes</a>
		</center>
		
		-->

	</body>
	
</html>

