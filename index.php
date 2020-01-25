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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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
		if(mysqli_num_rows($resultado) > 0) {
			echo "<table style='width 100%' border='1'>";
			echo "<tr><th>ID</th>"
				."<th>Descrição</th>"	
				."<th>Unidade</th>"
				."<th>Valor</th>"
				."<th>Criado em</th>"
				."<th>Modificado em</th>"
				."</tr>";
			while ($row = mysqli_fetch_array($resultado)) {
				echo "<tr><td>" . $row["id"] . "</td><td>" . $row["descricao"] . "</td><td>" 
				. $row["unidade"] . "</td><td>" . $row["valor"] . "</td><td>" 
				. $row["created"] . "</td><td>" . $row["modified"]."</td><td>"
				. "<a href=editar.php?id=" . $row["id"] . ">Editar</a> / <a href='excluir.php?id=" . $row["id"] . "'data-confirm='Tem certeza que deseja excluir esse produto?'>Excluir</a></td></tr>";
			}
		} else {
			echo "Nenhum produto cadastrado";
		}
		echo "<a href='cadastro.php'>Cadastrar</a><hr>";
		mysqli_close($conn);
        ?>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<script src="js/personalizado.js"></script>
    </body>
</html>
