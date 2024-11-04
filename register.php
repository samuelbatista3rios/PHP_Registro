<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root"; // Usuário padrão do MySQL no XAMPP
$password = "";     // Senha padrão (geralmente vazia no XAMPP)
$dbname = "unifi_registro";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Processa o formulário ao submeter
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $PRIMEIRO_NOME = $_POST['PRIMEIRO_NOME'];
    $ULTIMO_NOME = $_POST['ULTIMO_NOME'];
    $EMAIL = $_POST['EMAIL'];
    $SENHA = $_POST['SENHA'];
    $dispositivo = $_SERVER['REMOTE_ADDR']; // IP do dispositivo
    

    // Insere os dados no banco
    $sql = "INSERT INTO usuarios (PRIMEIRO_NOME,ULTIMO_NOME, EMAIL, SENHA, DISPOSITIVO, DATA_ACESSO)
            VALUES ('$PRIMEIRO_NOME', '$ULTIMO_NOME', '$EMAIL', '$SENHA','$dispositivo', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}

// Fecha a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Acesso à Rede</title>
    <link type="text/css" rel="stylesheet" href="https://fluig.hmtj.org.br:8443/style-guide/css/fluig-style-guide.min.css" />
    <script type="text/javascript" src="https://fluig.hmtj.org.br:8443/portal/resources/js/jquery/jquery.js"></script>
    <script type="text/javascript" src="https://fluig.hmtj.org.br:8443/portal/resources/js/jquery/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://fluig.hmtj.org.br:8443/portal/resources/js/mustache/mustache-min.js"></script>
    <script type="text/javascript" src="https://fluig.hmtj.org.br:8443/style-guide/js/fluig-style-guide.min.js" charset="utf-8"></script>
    <style>
        body, html {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f5f5f5;
            margin: 0;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #fff;
            text-align: center;
        }
        .login-container img {
            width: 150px;
            margin-bottom: 20px;
        }
        .fluig-input {
            width: 100%;
            margin-bottom: 15px;
        }
        .login-button {
            width: 100%;
            background-color: #ff3366;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
        }
        .forgot-password {
            display: block;
            margin-top: 15px;
            color: #888;
        }
    </style>
</head>
<body> 
    <div class="login-container">
    <h2 class="mb-4">Cadastro de Acesso à Rede</h2>
    <form method="post" action="register.php" class="form-group">
        <div class="fluig-input">
            <label for="PRIMEIRO_NOME">Primeiro Nome:</label>
            <input type="text" id="PRIMEIRO_NOME" name="PRIMEIRO_NOME" class="form-control" required placehold="Primeiro Nome">
        </div>

        <div class="fluig-input">
            <label for="ULTIMO_NOME">Último Nome:</label>
            <input type="text" id="ULTIMO_NOME" name="ULTIMO_NOME" class="form-control" required placehold="Ultimo Nome">
        </div>

        <div class="fluig-input">
            <label for="EMAIL">Email:</label>
            <input type="email" id="EMAIL" name="EMAIL" class="form-control" required placehold="email">
        </div>

        <div class="fluig-input">
            <label for="SENHA">Senha:</label>
            <input type="password" id="SENHA" name="SENHA" class="form-control" required>
        </div>

        <button type="submit" class="login-button">Cadastrar</button>
    </form>
    </div>
</body>
</html>
