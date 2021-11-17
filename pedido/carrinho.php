<?php
	require("../banco_dados.php");
?>

<html>

	<head>
		<title> ..:: Pizzaria Brasileira ::.. </title>
	</head>

	<body>

		<center>
		<img src="../imagens/principal.jpg"> 
		<br>
		<h2>Pizzaria Brasileira</h2>
		
		<br>
		<hr>
		<h3>Meu Carrinho :: Realizar Meu Pedido</h3>
		<hr>
		<br>

			<?php

				session_start();
				
				if(isset($_SESSION['cliente'])) {
				
					if(isset($_REQUEST["idProduto"])) {
					
						if(!isset($_SESSION["carrinho"]))
							$_SESSION["carrinho"][$_REQUEST["idProduto"]] = 1;
					
						else if(!isset($_SESSION["carrinho"][$_REQUEST["idProduto"]]))
							$_SESSION["carrinho"][$_REQUEST["idProduto"]] = 1;
					
						else
							$_SESSION["carrinho"][$_REQUEST["idProduto"]] += 1;
					
					}
				
					/*
					if(isset($_SESSION["carrinho"]))
						print_r($_SESSION["carrinho"]);
					//*/
					
					if(isset($_SESSION["carrinho"])) {
					
						$sql = "SELECT * FROM produto WHERE id IN (-1";
					
						foreach($_SESSION["carrinho"] as $idTemp => $qtdeTemp)
							$sql .= "," .$idTemp;

						$sql .= ")";
					
						//echo $sql;
				
						$result = $conn->query($sql);
			
						if ($result->num_rows > 0) {
					
							echo "<table border=1 align='center'>\n";
							echo "<thead>\n";
							echo "<tr bgcolor='#DDDDDD'>\n";
							echo "<th>Sabor</th>\n";
							echo "<th>Tamanho</th>\n";
							echo "<th>Preço (R$)</th>\n";
							echo "<th>Quantidade</th>\n";
							echo "<th>Sub-total (R$)</th>\n";
							echo "</tr>\n";
							echo "</thead>\n";
							echo "<tbody>\n";

							$total = 0;
						
							while($row = $result->fetch_assoc()) {
								echo "<tr>\n";
								echo "<td align='center'>" . $row["sabor"] . "</td>\n";
								echo "<td align='center'>" . $row["tamanho"] . "</td>\n";
								echo "<td align='center'>" . $row["preco"] . "</td>\n";
						
								$quantidade = $_SESSION["carrinho"][$row["id"]];
								echo "<td align='center'>" . $quantidade . "</td>\n";
						
								$subtotal = $quantidade * $row["preco"];
								echo "<td align='center'>" . $subtotal . "</td>\n";
								$total = $total + $subtotal;
								echo "</tr>\n";
							}
						
							echo "</tbody>\n";
							echo "</table>\n";
		
							echo "<center>\n";
							echo "<p>Valor total do pedido: R$ ". $total . "</p>\n";
							echo "</center>\n";
			
						} else
							echo "<p>Seu carrinho ainda não possui nenhum produto.</p>\n";
			
						$conn->close();
					
					} else
						echo "<p>Seu carrinho ainda não possui nenhum produto.</p>\n";					
				}
			
			?>
		
		<br>
		
		<center>
		<a href="../index.php">[ Adicionar produtos ]</a>
		<a href="limpar_carrinho.php">[ Limpar carrinho ]</a>
		</center>
				
	</body>
	
</html>

