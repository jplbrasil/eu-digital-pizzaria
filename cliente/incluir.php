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
	
		<?php

			$sql = "INSERT INTO cliente (nome, email, endereco, senha) VALUES (";
			$sql .= "'". $_REQUEST['nome'] . "'";
			$sql .= ", '". $_REQUEST['email'] . "'";
			$sql .= ", '". $_REQUEST['endereco'] . "'";
			
			// a funcao MD5 do MySQL gera um hash da string 'senha'
			// assim, a senha nao e' gravada em texto plano
			$sql .= ", MD5('". $_REQUEST['senha'] . "')";
			
			$sql .= ")";

			if ($conn->query($sql) === TRUE)
				echo "Cliente incluído(a) com sucesso!";
			else
				echo "Falha ao incluir cliente: " . $sql . "<br>" . $conn->error;

			$conn->close();
			
		?>
		
		<br> <br>
		
		<center>
		<a href="../index.php">Voltar para a Homepage</a>
		</center>

	</body>

</html>

