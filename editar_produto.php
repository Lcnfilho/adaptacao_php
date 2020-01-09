<?php

session_start();

include_once("conexao.php");

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$unidade = filter_input(INPUT_POST, 'unidade', FILTER_SANITIZE_STRING);
$valor_unitario = filter_input(INPUT_POST,'valor_unitario', FILTER_SANITIZE_STRING);

//echo "Descrição: $descricao <br>";
//echo "Unidade: $unidade <br>";
//echo "Valor unitário: $valor_unitario <br>";

if(empty($descricao)) {
	$_SESSION['msg'] = "<p style='color:red;'>O campo Descrição não pode estar em branco</p>";
	header("Location: editar.php");
} else {
	if($descricao_array == $descricao) {
		$_SESSION['msg'] = "<p style='color:red;'>Produto já cadastrado</p>";
		header("Location: editar.php");
	} else {
		if(empty($valor_unitario)) {
			$_SESSION['msg'] = "<p style='color:red;'>O campo Valor não pode estar em branco</p>";
			header("Location: editar.php");
		} else if(!is_numeric($valor_unitario)) {
			$_SESSION['msg'] = "<p style='color:red;'>Valor Unitário inválido: Digite apenas números e ponto para separa-los</p>";
			header("Location: editar.php");
		} else {
			$sql = "UPDATE produtos SET descricao='$descricao', unidade='$unidade', valor='$valor_unitario', modified=NOW() WHERE id='$id'";
			$resultado = mysqli_query($conn, $sql);

			if (mysqli_affected_rows($conn)) {
				$_SESSION['msg'] = "<p style='color:green;'>Produto editado com sucesso</p>";
				header("Location: index.php");
			} else {
				$_SESSION['msg'] = "<p style='color:red;'>Produto não pode ser editado</p>";
				header("Location: editar.php?id=$id");
			}
		}
	}
}
mysqli_close($conn);

?>
