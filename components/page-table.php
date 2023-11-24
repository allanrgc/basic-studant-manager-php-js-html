<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

function carregarDados() {
    $arquivoAlunos = "json-alunos.json";
    if (file_exists($arquivoAlunos)) {
        $dados = file_get_contents($arquivoAlunos);
        return json_decode($dados, true) ?? [];
    } else {
        return [];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Alunos</title>
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

        table {
            width: 80%;
            margin: 20px;
            border-collapse: collapse;
            
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            /* border-bottom: 3px solid #000; */
        }

        th {
            background-color: #333;
            color: white;
        }

        tbody tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <?php include "header.php" ?>

    <h1>Tabela de Alunos</h1>
    <table>
        <thead>
            <th>Nome</th>
            <th>Matrícula</th>
            <th>1ª Nota</th>
            <th>2ª Nota</th>
            <th>Média</th>
        </thead>
        <tbody>
            <?php
                $alunos = carregarDados();
                foreach ($alunos as $aluno) {
                    echo "<tr>";
                    echo "<td>" . $aluno["nome"] . "</td>";
                    echo "<td>" . $aluno["matricula"] . "</td>";
                    echo "<td>" . $aluno["n1"] . "</td>";
                    echo "<td>" . $aluno["n2"] . "</td>";
                    $media = ($aluno["n1"] + $aluno["n2"]) / 2;

                    echo "<td>" . number_format($media, 2) . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
