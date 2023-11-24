<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); // Hash da senha

    // Lógica para verificar se o usuário já existe
    $usuarios = file_get_contents("json-usuarios.json");
    $usuarios = json_decode($usuarios, true);

    if (!isset($usuarios[$usuario])) {
        // Adiciona o novo usuário ao array de usuários
        $usuarios[$usuario] = ["senha" => $senha];

        // Salva o array de usuários de volta no arquivo JSON
        file_put_contents("json-usuarios.json", json_encode($usuarios));

        $_SESSION["usuario"] = $usuario;
        header("Location: login.php");
        exit();
    } else {
        echo "Usuário já existe. Escolha outro nome de usuário.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #E6E6FA; /* Lavender (Light Purple) */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            color: #8A2BE2; /* Blue Violet */
            text-align: center;
            padding: 15px;
        }

        form {
            background-color: #FFF8DC; /* Cornsilk */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #2F4F4F; /* Dark Slate Gray */
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #808080; /* Gray */
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #800080; /* Purple */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4B0082; /* Indigo */
        }

        p {
            text-align: center;
            margin-top: 15px;
            color: #2F4F4F; /* Dark Slate Gray */
            padding: 15px;
        }

        a {
            color: #800080; /* Purple */
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Cadastre-se</h1>
    <form action="" method="POST">
        <label for="usuario">Usuário: </label>
        <input type="text" name="usuario" id="usuario" required> <br><br>
        <label for="senha">Senha: </label>
        <input type="password" name="senha" id="senha" required> <br><br>
        <button type="submit">Registrar</button>
    </form>
    <p>Já possui uma conta? <a href="login.php">Faça login aqui</a>.</p>
</body>
</html>