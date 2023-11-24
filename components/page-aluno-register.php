<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

function salvarDados($dados) {
    $arquivoAlunos = "json-alunos.json";
    file_put_contents($arquivoAlunos, json_encode($dados));
}

function carregarDados() {
    $arquivoAlunos = "json-alunos.json";
    if (file_exists($arquivoAlunos)) {
        $dados = file_get_contents($arquivoAlunos);
        return json_decode($dados, true);
    } else {
        return [];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alunos = carregarDados();

    $aluno = [
        "nome" => $_POST["nome"],
        "matricula" => $_POST["matricula"],
        "n1" => $_POST["n1"],
        "n2" => $_POST["n2"],
    ];

    $alunos[] = $aluno;
    salvarDados($alunos);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #E6F7FF;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            /* padding: 6px; */
            text-align: center;
        }

        
        h1{
            text-align: center;
        }

        #form-container2 {
            
            /* width: 50%; */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #form-container {
            background-color: #BED4FF;
            padding: 20px;
            margin: 20px;
            border-radius: 10px;
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #input-style {
            padding: 20px;
            border-radius: 15px;
            border: none;
            width: 400px;
        }

        button{
            padding: 10px;
            border-radius: 15px;
            border: none;
            width: 200px;
        }
        button:hover{
            background:#528bff;
        }

    </style>
</head>
<body>
    <?php include "header.php" ?>

    <h1>Cadastro de Alunos</h1>
    <div id="form-container2">
        <form id="form-container" action="page-aluno-register.php" method="POST">
            <input required id="input-style" placeholder="Nome" type="text" name="nome" id="nome"> <br><br>
            <input required id="input-style" placeholder="Matrícula" type="text" name="matricula" id="matricula"> <br><br>
            <input required id="input-style" placeholder="1ª Nota" type="text" name="n1" id="n1"> <br><br>
            <input required id="input-style" placeholder="2ª Nota" type="text" name="n2" id="n2"> <br><br>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
