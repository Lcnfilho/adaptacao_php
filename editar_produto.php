<?php

session_start();

include_once("conexao.php");

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$unidade = filter_input(INPUT_POST, 'unidade', FILTER_SANITIZE_STRING);
$valor_unitario = filter_input(INPUT_POST,'valor_unitario', FILTER_SANITIZE_STRING);

$query_select = "SELECT descricao FROM produtos WHERE descricao = '$descricao' AND id != '$id' LIMIT 1";
$select = mysqli_query($conn, $query_select);
$existe = mysqli_num_rows($select);

if(empty($descricao)) {
	$_SESSION['msg'] = "<p style='color:red;'>O campo Descrição não pode estar em branco</p>";
	header("Location: editar.php");
} else {
	if($existe == 1) {
		$_SESSION['msg'] = "<p style='color:red;'>Produto já cadastrado</p>";
		header("Location: editar.php");
	} else {
		if(empty($valor_unitario)) {
			$_SESSION['msg'] = "<p style='color:red;'>O campo Valor não pode estar em branco</p>";
			header("Location: editar.php");
		} else if(!is_numeric($valor_unitario)) {
			$_SESSION['msg'] = "<p style='color:red;'>Valor Unitário inválido: Digite apenas números e ponto para separa-los</p>";
			header("Location: editar.php");
		} else if($valor_unitario < 0) {
			$_SESSION['msg'] = "<p style='color:red;'>Valor Unitário inválido</p>";
			header("Location: editar.php");
		} else {
			$sql = "UPDATE produtos SET descricao='$descricao', unidade='$unidade', valor='$valor_unitario', modified=NOW() WHERE id='$id'";
			$resultado = mysqli_query($conn, $sql);

			if (mysqli_affected_rows($conn)) {
				$_SESSION['msg'] = "<p style='color:green;'>Produto editado com sucesso</p>";
				header("Location: index.php");
			} else {
				$_SESSION['msg'] = "<p style='color:red;'>Produto não pode ser editado</p>";
				header("Location: editar.php");
			}
		}
	}
}
mysqli_close($conn);

?>
