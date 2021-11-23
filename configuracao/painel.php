<?php
	require("../banco_dados.php");
?>

<html>

	<head>
		<title> ..:: Pizzaria Brasileira ::.. </title>
	</head>

	<body>

		<center>

		<h1>Pizzaria Brasileira</h1>
				
		<?php
			
			session_start();
			
			if(isset($_SESSION['configurador'])) {
				echo "Olá, " . strtok($_SESSION['configurador']," ") . " &nbsp <a href='logoff.php'>sair</a>\n";
			}
			else {

				echo "<form action='autenticar.php'>\n";
	  			echo "<table border=0>\n";		
				echo "<tr>\n";
				echo "<td><b>Entre com o login de configurador</b> &nbsp </td>\n";
				echo "<td>Login: <input type='text' name='login'></td>\n";
				echo "<td>Senha: <td><input type='password' name='senha'></td>\n";
				echo "<td><input type='submit' value='Entrar'></td>\n";
				echo "</tr>\n";
				echo "</table>\n";			
				echo "</form>\n";
			}
			
		?>

		</center>
		
		<hr>
		
		<br> <br>

		<table border=1 align="center" style="width:80%">
		
			<tr>

				<td align='center' style='width:10%'>
				<a href='painel.php?modulo=Cliente'>Cliente</a>
				</td>

				<td align='center' style='width:10%'>
				<a href='painel.php?modulo=Pedido'>Pedido</a>
				</td>

				<td align='center' style='width:10%'>
				<a href='painel.php?modulo=Produto'>Produto</a>
				</td>
				
			</tr>
		
		</table>

		<hr>
		
		<br> <br>

		<center>
		
		<?php
		
			if( isset($_SESSION['configurador']) && isset($_REQUEST["modulo"]) ) {
				
				if($_REQUEST["modulo"] == "Cliente")
					echo "<iframe src='../cliente/cadastro.php' height='500' width='1200' title='Cliente'></iframe>\n";

				else if($_REQUEST["modulo"] == "Pedido")
					echo "<iframe src='../pedido/cadastro.php' height='500' width='1200' title='Cliente'></iframe>\n";

				else if($_REQUEST["modulo"] == "Produto")
					echo "<iframe src='../produto/cadastro.php' height='500' width='1200' title='Cliente'></iframe>\n";
			}
					
		?>
		
		</center>
		
	</body>
	
</html>

