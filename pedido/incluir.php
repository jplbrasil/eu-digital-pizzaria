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

			if($_REQUEST['senha01'] != $_REQUEST['senha02']){
				
				echo "Atenção: a senha informada no segundo campo não corresponde à primeira. Por favor, tente novamente.";
				echo "<br> <br>\n";
				echo "<center>\n";
				echo "<a href='cadastrar.php'>Voltar ao Formulário de Cadastro</a>\n";
				echo "</center>\n";
			}
		
			else {
				$sql = "INSERT INTO cliente (nome, email, endereco, senha) VALUES (";
				$sql .= "'". $_REQUEST['nome'] . "'";
				$sql .= ", '". $_REQUEST['email'] . "'";
			
				$endereco = $_REQUEST['rua'] . ", " . $_REQUEST['numero'] . ". " . $_REQUEST['casa_apto'] . ". Bairro: " . $_REQUEST['bairro'] . ". " . $_REQUEST['cidade'] . ". " . $_REQUEST['estado'] . ". CEP: " . $_REQUEST['cep'];
				$sql .= ", '". $endereco . "'";
			
				// a funcao MD5 do MySQL gera um hash da string 'senha'
				// assim, a senha nao e' gravada em texto plano
				$sql .= ", MD5('". $_REQUEST['senha01'] . "')";
			
				$sql .= ")";

				if ($conn->query($sql) === TRUE)
					echo "Cliente incluído(a) com sucesso!";
				else
					echo "Falha ao incluir cliente: " . $sql . "<br>" . $conn->error;

				$conn->close();
			}
			
		?>
		
		<br> <br>
		
		<center>
		<a href="../index.php">Voltar para a Homepage</a>
		</center>

	</body>

</html>

