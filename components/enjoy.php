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
            margin: 0;
            padding: 0;
        }

        h1, p {
            padding: 10px;
            text-align: center;
        }

        .display-container{
            display: flex;
            justify-content: center;
        }

        
    

    </style>
</head>
<?php include "header.php" ?>
<body>
    <h1>Entretenimento para <?php echo $_SESSION["usuario"]; ?></h1>
    <div class="display-container">

        <img src="../assets/dance-cute.gif" alt="GIF">
    </div>

</body>
</html>
