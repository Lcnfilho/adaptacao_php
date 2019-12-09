<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    </head>
        <meta charset="utf-8">
        <title>Cadastro de Produtos</title>
    </head>
    </body>
        <div stile="text-align:center">
    
        <h1>Cadastrar Produto</h1>
        <?php
        if(isset($_SESSION['msg'])) {
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
        ?>
        <form method="POST" action="produtos.php">
            
            <label>Descrição: <input type="text" name="descricao"></label><br><br>
            
            <label>Unidade: </label>
            <select name="unidade">
                <option value="Kg">Kg</option>
                <option value="Un.">Un.</option>
                <option value="L">L</option>
                <option value="mL">mL</option>
            </select><br><br>

            <label>Valor Unitário: <input type="text" name="valor_unitario"></label><br><br>
            
            <input type="submit" value="Cadastrar">
            <input type="reset" value="Limpar">
        </form>
        </div>
    </body>
</html>
