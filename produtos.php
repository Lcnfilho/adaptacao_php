<?php

session_start();

include_once("conexao.php");

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$unidade = filter_input(INPUT_POST, 'unidade', FILTER_SANITIZE_STRING);
$valor_unitario = filter_input(INPUT_POST,'valor_unitario', FILTER_SANITIZE_STRING);

//echo "Descrição: $descricao <br>";
//echo "Unidade: $unidade <br>";
//echo "Valor unitário: $valor_unitario <br>";
$query_select = "SELECT descricao FROM produtos WHERE descricao = '$descricao' LIMIT 1";
$select = mysqli_query($conn, $query_select);
$existe = mysqli_num_rows($select);

if(empty($descricao)) {
	$_SESSION['msg'] = "<p style='color:red;'>O campo Descrição não pode estar em branco</p>";
	header("Location: cadastro.php");
} else {
	if($existe == 1) {
		$_SESSION['msg'] = "<p style='color:red;'>Produto já cadastrado</p>";
		header("Location: cadastro.php");
	} else {
		if(empty($valor_unitario)) {
			$_SESSION['msg'] = "<p style='color:red;'>O campo Valor não pode estar em branco</p>";
			header("Location: cadastro.php");
		} else if(!is_numeric($valor_unitario)) {
			$_SESSION['msg'] = "<p style='color:red;'>Valor Unitário inválido: Digite apenas números e ponto para separa-los</p>";
			header("Location: cadastro.php");
		} else if($valor_unitario < 0) {
			$_SESSION['msg'] = "<p style='color:red;'>Valor Unitário inválido</p>";
			header("Location: cadastro.php");
		} else {
			$sql = "INSERT INTO produtos (descricao, unidade, valor, created) VALUES ('$descricao', '$unidade', '$valor_unitario', NOW())";
			$resultado = mysqli_query($conn, $sql);

			if (mysqli_insert_id($conn)) {
				$_SESSION['msg'] = "<p style='color:green;'>Produto cadastrado com sucesso</p>";
				header("Location: index.php");
			} else {
				$_SESSION['msg'] = "<p style='color:red;'>Produto não pode ser cadastrado</p>";
				header("Location: cadastro.php");
			}
		}
	}
}
mysqli_close($conn);

?>
