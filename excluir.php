<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
	$sql = "DELETE FROM produtos WHERE id = '$id'";
	$resultado = mysqli_query($conn, $sql);
	if(mysqli_affected_rows($conn) != -1) {
		$_SESSION['msg'] = "<p style='color:green;'>Produto excluido</p>";
		header("Location: index.php");
	} else {
		$_SESSION['msg'] = "<p style='color:red;'>Produto não pode ser excluido</p>";
		header("Location: index.php");
	}
} else {
	$_SESSION['msg'] = "<p style='color:red;'>Selecione um produto válido</p>";
	header("Location: index.php");
}
?>
