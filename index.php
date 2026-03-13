<?php
// Configurações de erro e header DEVEM vir antes de qualquer HTML
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=iso-8859-1');

// Seus dados de conexão
$servername = "db";
$username = "root";
$password = "Senha123";
$database = "meubanco";

$link = new mysqli($servername, $username, $password, $database);
?>

<html>
<head>
    <title>Exemplo PHP - Microsserviços</title>
</head>
<body>

<?php
echo 'Versao Atual do PHP: ' . phpversion() . '<br>';

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$valor_rand1 =  rand(1, 999);
$valor_rand2 = strtoupper(substr(bin2hex(random_bytes(4)), 1));
$host_name = gethostname();

// Mostra qual réplica (container) está respondendo
echo "Respondido pelo Host: " . $host_name . "<br>";

$query = "INSERT INTO dados (AlunoID, Nome, Sobrenome, Endereco, Cidade, Host) VALUES ('$valor_rand1' , '$valor_rand2', '$valor_rand2', '$valor_rand2', '$valor_rand2', '$host_name')";

if ($link->query($query) === TRUE) {
  echo "<strong>New record created successfully!</strong>";
} else {
  echo "Error: " . $link->error;
}
?>
</body>
</html>
