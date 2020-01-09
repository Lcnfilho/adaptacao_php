<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$sql = "SELECT * FROM produtos WHERE id = '$id'";
$resultado = mysqli_query($conn, $sql);
$row_produto = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">
    </head>
        <meta charset="utf-8">
        <title>Editar</title>
    </head>
    </body>
        <h1>Editar Produto</h1>
        <?php
        if(isset($_SESSION['msg'])) {
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
        ?>
        <form method="POST" action="editar_produto.php">
            <input type="hidden" name="id" value="<?php echo $row_produto["id"];?>">
            
            <label>Descrição: <input type="text" name="descricao" placeholder="Descrição do produto" value="<?php echo $row_produto["descricao"];?>"></label><br><br>
            
            <label>Unidade: </label>
            <select name="unidade">
                <option value="Kg">Kg</option>
                <option value="Un.">Un.</option>
                <option value="L">L</option>
                <option value="mL">mL</option>
            </select><br><br>

            <label>Valor Unitário: <input type="text" name="valor_unitario" placeholder="Valor do produto" value="<?php echo $row_produto["valor"];?>"></label><br><br>
            
            <input type="submit" value="Editar"><br><hr>
            <a href='index.php'>Listar</a>
        </form>
    </body>
</html>
