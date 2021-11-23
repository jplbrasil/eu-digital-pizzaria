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
	  
			<table border=0 align="center">
	
				<caption><h3>Identificação</h3></caption>
	
				<tr>
					<td>Nome completo</td>
					<td><input type="text" name="nome" size="50"></td>
				</tr>

				<tr>
					<td>E-mail</td>
					<td><input type="text" name="email" size="50"></td>
				</tr>

				<tr>
					<td>Telefone</td>
					<td><input type="text" name="telefone" size="20"></td>
				</tr>

			</table>
		
			<table border=0 align="center">

				<caption><h3>Endereço</h3></caption>

				<tr>
					<td>Rua / Avenida</td>
					<td colspan=2><input type="text" name="rua" size="60"></td>
				</tr>

				<tr>
					<td>Número</td>
					<td><input type="text" name="numero" size="10"></td>
				</tr>

				<tr>
					<td colspan=2>
						<input type="radio" name="casa_apto" value="Casa" checked>Casa</input>
						<input type="radio" name="casa_apto" value="Apartamento">Apartamento</input>
						<input type="text" name="apto_numero" size="10">
					</td>
				</tr>

				<tr>
					<td>Bairro</td>
					<td><input type="text" name="bairro" size="30"></td>
				</tr>

				<tr>
					<td>Cidade</td>
					<td><input type="text" name="cidade" size="30"></td>
				</tr>

				<tr>
					<td>Estado</td>
					<td><input type="text" name="estado" size="30"></td>
				</tr>

				<tr>
					<td>CEP</td>
					<td><input type="text" name="cep" size="30"></td>
				</tr>
				
			</table>
		
			<table border=0 align="center">

				<caption><h3>Defina uma Senha</h3></caption>
				
				<tr>
					<td>Nova senha</td>
					<td><input type="password" name="senha01" size="30"></td>
				</tr>

				<tr>
					<td>Repita sua senha</td>
					<td><input type="password" name="senha02" size="30"></td>
				</tr>
				
			</table>
		
			<br>
		
			<center>
			<input type="submit" value="Cadastrar">
			</center>

		</form>
				
	</body>

</html>

