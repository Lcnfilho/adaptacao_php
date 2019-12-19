<?php
include_once("conexao.php");

if(!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    </head>
        <meta charset="utf-8">
        <title>Cadastro de Produtos</title>
    </head>
    </body>
        <h1>Cadastrar Produto</h1>
        <?php
		$sql = "SELECT * FROM produtos";
		$resultado = mysqli_query($conn, $sql);
		if(mysqli_num_rows($resultado) > 0) {
			echo "<table style='width 100%' border='1'>";
			echo "<tr><th>ID</th>"
				."<th>Descrição</th>"	
				."<th>Unidade</th>"
				."<th>Valor</th>"
				."<th>Criado em</th>"
				."</tr>";
			while ($row = mysqli_fetch_array($resultado)) {
				echo "<tr><td>" . $row["id"] . "</td><td>" . $row["descricao"] . "</td><td>" . $row["unidade"] . "</td><td>" . $row["valor"] . "</td><td>" . $row["created"] . "</td></tr>";
			}
		} else {
			echo "Nenhum produto cadastrado";
		}
		echo "<a href='cadastro.php'>Cadastrar</a><hr>";
        ?>
    </body>
</html>
