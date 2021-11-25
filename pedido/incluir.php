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
		<h2>Pizzaria Brasileira - Cadastro de Pedidos</h2>
		<hr>		
	
		<?php

				session_start();
		
				$sql = "INSERT INTO pedido (data, hora, id_cliente, tipo_pagamento, tipo_entrega, valor_produtos, valor_frete, valor_total, status) VALUES (";
				$sql .= "'". date("Y-m-d", time()) . "'";
				$sql .= ", '". date("H:i:s", time()) . "'";
				$sql .= ", '". $_SESSION['idCliente'] . "'";
				$sql .= ", '". $_REQUEST['tipo_pagamento'] . "'";
				$sql .= ", '". $_REQUEST['tipo_entrega'] . "'";
				$sql .= ", '". $_REQUEST['valor_produtos'] . "'";
				$sql .= ", '". $_REQUEST['valor_frete'] . "'";
				$sql .= ", '". $_REQUEST['valor_total'] . "'";
				$sql .= ", '". $_REQUEST['status'] . "'";
				$sql .= ")";
				
				//echo "<br><hr>" . $sql . "<hr><br>\n";
				
				///*
				if ($conn->query($sql) === TRUE) {
					$id_pedido = $conn->insert_id;
					echo "Pedido incluído com sucesso!";
				}
				else
					echo "Falha ao incluir pedido: " . $sql . "<br>" . $conn->error;

				//*/
				
				$sql = "SELECT * FROM produto WHERE id IN (-1";
				foreach($_SESSION["carrinho"] as $idTemp => $qtdeTemp)
					$sql .= "," .$idTemp;
				$sql .= ")";
				$result = $conn->query($sql);
				
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {

						$temp = "INSERT INTO itens_pedido (id_pedido, id_produto, quantidade, preco) VALUES (";
						$temp .= "'" . $id_pedido . "'";
						$temp .= ", '" . $row["id"] . "'";
						$temp .= ", '" . $_SESSION["carrinho"][$row["id"]] . "'";
						$temp .= ", '" . $row["preco"] . "'";
						$temp .= ")";
						
						//echo "<br><hr>" . $temp . "<hr><br>\n";

						//*
						if ($conn->query($temp) === FALSE)
							echo "Falha ao incluir itens do pedido: " . $temp . "<br>" . $conn->error;

						//*/
					}
				}

				$conn->close();

				unset($_SESSION["carrinho"]);
	
		?>
		
		<br> <br>
		
		<center>
		<a href="../index.php">Voltar para a Homepage</a>
		</center>

	</body>

</html>