<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #E6F7FF;
            margin: 0;
            padding: 0;
        }

        h1, p {
            padding: 10px;
        }

        .display-container{
            display: flex;

        }

        .container {
            background-color: #BED4FF;
            padding: 20px;
            margin: 20px;
            border-radius: 10px;
            width: 45%; /* Ajuste conforme necessário */
            box-sizing: border-box;
        }

        h1, h3, p {
            margin-bottom: 10px;
        }

        button {
            padding: 10px;
            background-color: #333333ae;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #528bff;
        }

        a{
            text-decoration: none;
            color: white;
        }

    </style>
</head>
<?php include "header.php" ?>
<body>
    <h1>Bem-vindo <?php echo $_SESSION["usuario"]; ?> !</h1>
    <!-- <p>Bem-vindo, <?php echo $_SESSION["usuario"]; ?>!</p> -->
    <!-- <p>Conteúdo da Main aqui.</p> -->
    <img src="../assets/cute-gif.gif" alt="GIF" width="75px">

    
    <div class="display-container">

        <div class="container">
            <h3>Cadastrar Aluno</h3>
            <p>Aqui você realiza o cadastro do aluno com nome,
                matrícula, 1ª e 2ª nota.
            </p>
            <button onclick="window.location.href='page-aluno-register.php'">Cadastrar aluno</button>
        </div>
    
        <div class="container">
            <h3>Consultar Tabela</h3>
            <p>Consulte os dados de algum aluno.</p>
            <button onclick="window.location.href='page-table.php'">Ir para a Página de Tabela</button>
        </div>
    </div>
    <div class="display-container">
        <div class="container">
            <h3>Enjoy</h3>
            <p>Para você se divertir por 3 segundos (ou menos).</p>
            <button onclick="window.location.href='enjoy.php'">Partiu diversão</button>
        </div>
        <div class="container">
            <h3>Suporte</h3>
            <p>Entre em contato com o suporte para tirar suas dúvidas, dar sugestões ou esculhambamentos.</p>
            <button><a href="https://github.com/allanrgc">Ir para a Página de Esculhambaçao</a></button>
        </div>
    </div>
</body>
</html>
