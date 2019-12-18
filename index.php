<?php
session_start();
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
        if(isset($_SESSION['msg'])) {
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		$sql = "SELECT * FROM produtos";
		$resultado = mysqli_query($conn, $sql);
		echo "ID" . " | " . "Descrição" . " | " . "Unidade" . " | " . "Valor" . " | " . "Cadastrado em" . "<br><hr>";
		while ($row = mysqli_fetch_assoc($resultado)) {
			echo $row["id"] . " | " . $row["descricao"] . " | " . $row["unidade"] . " | " . $row["valor"] . " | " . $row["created"] . "<br><hr>";
		}
		echo "<a href='cadastro.php'>Cadastrar</a>";
        ?>
    </body>
</html>
