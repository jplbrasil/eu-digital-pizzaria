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
		<h2>Pizzaria Brasileira - Cadastro de Clientes</h2>
		<hr>		
		
		</center>
		
		<br>

		<center>
		<?php
		
			$sql = "SELECT nome, senha FROM cliente";
			$sql =  $sql . " WHERE email = '" . $_REQUEST['email'] ."'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {

				$row = $result->fetch_assoc();
				
				if(MD5($_REQUEST['senha']) == $row["senha"]) {
					session_start();
					$_SESSION['cliente'] = $row["nome"];
					echo "Bem vindo(a) " . strtok($_SESSION['cliente']," ") . "!\n";
				}
				
				else
					echo "Senha incorreta.\n";
			}
			
			else
				echo "Seu e-mail não foi encontrado em nosso cadastro.\n";
			
			$conn->close();
		
		?>
		</center>
		
		<br>
		
		<center>
		<a href="../index.php">Voltar para a Homepage</a>
		</center>
				
	</body>

</html>

