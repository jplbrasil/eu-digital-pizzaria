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

		<h3>Meu Pedido</h3>

			<?php

				session_start();
				
				if(isset($_SESSION['cliente'])) {

					// calcula o valor total dos produtos incluidos pelo cliente no carrinho (tela anterior a essa)
					if(isset($_SESSION["carrinho"])) {
											
						$sql = "SELECT * FROM produto WHERE id IN (-1";
						foreach($_SESSION["carrinho"] as $idTemp => $qtdeTemp)
							$sql .= "," .$idTemp;
						$sql .= ")";
						$result = $conn->query($sql);
			
						if ($result->num_rows > 0) {
							$valor_total_produtos = 0;
							while($row = $result->fetch_assoc()) {
								$quantidade = $_SESSION["carrinho"][$row["id"]];
								$valor_total_produtos += $quantidade * $row["preco"];
							}
						} else
							echo "<p>Seu carrinho ainda não possui nenhum produto.</p>\n";

					} else
						echo "<p>Seu carrinho ainda não possui nenhum produto.</p>\n";

					$sql = "SELECT nome, endereco FROM cliente WHERE id = '" . $_SESSION["idCliente"] . "'";
					$result = $conn->query($sql);
					$row = $result->fetch_assoc();

					echo "<table border='1' align='center'>\n";
					echo "<caption><h4>Dados do Cliente</h4></caption>\n";
					echo "<tr bgcolor='#DDDDDD'>\n";
					echo "<th>Nome</th>\n";
					echo "<th>Endereço</th>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "<td style='padding:10px'>" . $row["nome"] . "</td>\n";
					echo "<td style='padding:10px'>" . $row["endereco"] . "</td>\n";
					echo "</tr>\n";
					echo "</table>\n";

					echo "<br>\n";

					echo "<form action='incluir.php' method='GET'>\n";

					echo "<table border='0' align='center'>\n";

					echo "<tr>\n";
					echo "<td style='padding:10px' valign='top'>\n";
					
					echo "<table border='1' align='center'>\n";
					echo "<caption><h4>Tipo de Pagamento</h4></caption>\n";
					echo "<tr>\n";
					echo "<td style='padding:10px'>\n";
					echo "<input type='radio' name='tipo_pagamento' value='Dinheiro' checked>Dinheiro</input>\n";
					echo "<br>\n";
					echo "<input type='radio' name='tipo_pagamento' value='PIX'>PIX</input>\n";
					echo "<br>\n";
					echo "<input type='radio' name='tipo_pagamento' value='Credito'>Cartão de Crédito</input>\n";
					echo "<br>\n";
					echo "<input type='radio' name='tipo_pagamento' value='Debito'>Cartão de Débito</input>\n";
					echo "<br>\n";
					echo "<input type='radio' name='tipo_pagamento' value='Boleto'>Boleto</input>\n";
					echo "</td>\n";
					echo "</tr>\n";
					echo "</table>\n";

					echo "</td>\n";
					echo "<td style='padding:10px' valign='top'>\n";

					// calculo do valor do frete - implementar no futuro
					$valor_frete = "15.90";
					
					echo "<table border='1' align='center'>\n";
					echo "<caption><h4>Tipo de Entrega</h4></caption>\n";
					echo "<tr>\n";
					echo "<td style='padding:10px'>\n";
					echo "<input type='radio' name='tipo_entrega' value='Delivery' checked>Delivery (valor do frete: R$ " . $valor_frete . ")</input>\n";
					echo "<br>\n";
					echo "<input type='radio' name='tipo_entrega' value='Cliente retira na loja'>Cliente retira na loja</input>\n";
					echo "</td>\n";
					echo "</tr>\n";
					echo "</table>\n";
					
					echo "</td>\n";
					echo "<td style='padding:10px' valign='top'>\n";
					
					$valor_total_pedido = $valor_total_produtos + $valor_frete;
										
					echo "<table border='1' align='center'>\n";
					echo "<caption><h4>Resumo do Pedido</h4></caption>\n";
					echo "<tr>\n";				
					echo "<td align='left' style='padding:10px'>\n";					
					echo "<input type='hidden' name='valor_produtos' value='" . $valor_total_produtos . "'>\n";
					echo "<input type='hidden' name='valor_frete' value='" . $valor_frete . "'>\n";
					echo "<input type='hidden' name='valor_total' value='" . $valor_total_pedido . "'>\n";
					echo "<input type='hidden' name='status' value='pendente confirmacao'>\n";
					printf("<p>Valor total dos produtos: R$ %01.2f </p>\n", $valor_total_produtos);
					printf("<p>Valor do frete: R$ %01.2f </p>\n", $valor_frete);
					printf("<p>Valor total do pedido: R$ %01.2f </p>\n", $valor_total_pedido);
					echo "</td>\n";
					echo "</tr>\n";
					echo "</table>\n";

					echo "<br>\n";
					echo "<input type='submit' value='enviar o pedido'>\n";
					
					echo "<br>\n";
					echo "<br>\n";
					echo "<a href='carrinho.php'><b>rever meu carrinho</b></a>\n";
					
					echo "</td>\n";
					echo "</tr>\n";
					echo "</table>\n";
					
					echo "</form>\n";			
				}
				
				$conn->close();			
			?>

	</body>
	
</html>

