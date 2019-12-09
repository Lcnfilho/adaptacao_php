<?php

$servername = "localhost";
$username = ""; 
$password = ""; 
$database = "";

$conn = mysql_connect($servername, $username, $password, $database);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$unidade = filter_input(INPUT_POST, 'unidade', FILTER_SANITIZE_STRING);
$valor_unitario = filter_input(INPUT_POST,'valor_unitario');

//echo "Descrição: $descricao <br>";
//echo "Unidade: $unidade <br>";
//echo "Valor unitário: $valor_unitario <br>";

$sql = "INSERT INTO produtos (description, unity, value, created) VALUES ('$descricao', '$unidade', '$valor_unitario', NOW())";

if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>
