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
		
		<form action="incluir.php">
	  
			<table border=1 align="center">
	
				<tr>
					<td>Nome</td>
					<td><input type="text" name="nome"></td>
				</tr>

				<tr>
					<td>E-mail</td>
					<td><input type="text" name="email"></td>
				</tr>

				<tr>
					<td>Endereço</td>
					<td><input type="text" name="endereco"></td>
				</tr>

				<tr>
					<td>Senha</td>
					<td><input type="password" name="senha"></td>
				</tr>
			
			</table>
		
			<br>
		
			<center>
			<input type="submit" value="Cadastrar">
			</center>

		</form>

		<br>
		
		<center>
		<a href="../index.php">Voltar para a Homepage</a>
		</center>
				
	</body>

</html>

