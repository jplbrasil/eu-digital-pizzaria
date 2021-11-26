<?php
	require("../banco_dados.php");
?>

<html>

	<head>
		<title> ..:: Pizzaria Brasileira ::.. </title>
	</head>

	<body>

		<center>
		<!-- <img src="../imagens/principal.jpg"> 
		<br>
		-->
		<h1>Pizzaria Brasileira</h1>
		
		<br> <hr>

		<h3>Meu Carrinho</h3>

			<?php

				session_start();
				
				if(isset($_SESSION['cliente'])) {

					echo "<table border='0' align='center'>\n";
					echo "<tr>\n";
					echo "<td align='center' valign='top' style='padding:10px'>\n";
					echo "<a href='../index.php'><b>adicionar mais produtos</b></a>\n";
					echo "</td>\n";
					echo "<td align='center' valign='top' style='padding:10px'>\n";
					echo "<a href='limpar_carrinho.php'><b>limpar todo o carrinho</b></a>\n";
					echo "</td>\n";
					echo "<td align='center' style='padding:10px'>\n";
					echo "<form action='pagamento.php' method='GET'>\n";
					echo "<input type='submit' value='criar um pedido >>'>\n";
					echo "</form>\n";
					echo "</td>\n";
					echo "</tr>\n";
					echo "</table>\n";
					
					echo "<hr>\n";
				
					if(isset($_REQUEST["idProduto"]) && isset($_REQUEST["operacao"])) {
						
						if(!isset($_SESSION["carrinho"]))
							$_SESSION["carrinho"][$_REQUEST["idProduto"]] = 0;

						if(!isset($_SESSION["carrinho"][$_REQUEST["idProduto"]]))
							$_SESSION["carrinho"][$_REQUEST["idProduto"]] = 0;
					
							if($_REQUEST["operacao"] == "adicionar")
								$_SESSION["carrinho"][$_REQUEST["idProduto"]] += 1;
								
							else if($_REQUEST["operacao"] == "subtrair")
								if($_SESSION["carrinho"][$_REQUEST["idProduto"]] > 1)
									$_SESSION["carrinho"][$_REQUEST["idProduto"]] -= 1;
								else
									unset($_SESSION["carrinho"][$_REQUEST["idProduto"]]);
					}
				
					/*
					if(isset($_SESSION["carrinho"]))
						print_r($_SESSION["carrinho"]);
					//*/
					
					if(isset($_SESSION["carrinho"])) {
											
						$sql = "SELECT * FROM produto WHERE id IN (-1";
						foreach($_SESSION["carrinho"] as $idTemp => $qtdeTemp)
							$sql .= "," .$idTemp;
						$sql .= ") ORDER BY categoria, titulo";
						$result = $conn->query($sql);
			
						if ($result->num_rows > 0) {
					
							echo "<table border='1' align='center'>\n";
							echo "<caption><h3>Resumo dos Produtos Selecionados</h3></caption>\n";
							echo "<thead>\n";
							echo "<tr bgcolor='#DDDDDD'>\n";
							echo "<th>Produto</th>\n";
							echo "<th>Categoria</th>\n";
							echo "<th>Preço</th>\n";
							echo "<th>Quantidade</th>\n";
							echo "<th>Sub-total</th>\n";
							echo "</tr>\n";
							echo "</thead>\n";
							echo "<tbody>\n";

							$total = 0;
						
							while($row = $result->fetch_assoc()) {
								echo "<tr>\n";
								echo "<td align='center' style='padding:10px'>" . $row["titulo"] . "</td>\n";
								echo "<td align='center' style='padding:10px'>" . $row["categoria"] . "</td>\n";
								printf("<td align='center' style='padding:10px'> R$ %01.2f </td>", $row["preco"]);
						
								$quantidade = $_SESSION["carrinho"][$row["id"]];
								echo "<td align='center' style='padding:10px' width='20px'>";
								echo "<a href='carrinho.php?idProduto=" . $row["id"] . "&operacao=subtrair'><img width='15%' src='../imagens/subtracao.png'></a>";
								echo "&nbsp &nbsp" . $quantidade . "&nbsp &nbsp";
								echo "<a href='carrinho.php?idProduto=" . $row["id"] . "&operacao=adicionar'><img width='15%' src='../imagens/adicao.png'></a>";
								echo "</td>\n";
						
								$subtotal = $quantidade * $row["preco"];
								printf("<td align='center' style='padding:10px'> R$ %01.2f </td>", $subtotal);
								$total = $total + $subtotal;
								echo "</tr>\n";
							}
						
							echo "</tbody>\n";
							echo "</table>\n";
		
							echo "<center>\n";
							printf("<p>Soma dos produtos: R$ %01.2f </p>\n", $total);
							echo "</center>\n";
			
						} else
							echo "<p>Seu carrinho ainda não possui nenhum produto.</p>\n";
			
						$conn->close();
					
					} else
						echo "<p>Seu carrinho ainda não possui nenhum produto.</p>\n";

					echo "<br> <hr> <br>\n";
				}
			
			?>
						
	</body>
	
</html>

