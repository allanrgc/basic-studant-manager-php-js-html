<head>
    <style>
        header {
            font-family: Arial, sans-serif;
            text-align: center;
            /* padding: 6px; */
            
        }
        
        nav {
            display: flex;
            justify-content: space-between;
            background-color: #333fffae;
            padding: 10px;
        }
        
        nav a {
            color: white;
            text-decoration: none;
            padding: 8px;
            margin-right: 10px;
            border-radius: 5px;
            /* margin-left: 150px; */
        }

        nav a:hover {
            background-color: #555fffff;
        }

        
    </style>
</head>
<header>
    <?php
    // Exemplo de redirecionamento usando header
    // session_start();
    $_SESSION["usuario"]; // Substitua isso com o nome de usuário real

    // Links para as páginas
    
    $pageMainLink = "page-main.php";
    // $pageTableLink = "page-table.php";
    $logoutLink = "logout.php";
    ?>

    <nav>
        <a href="<?php echo $pageMainLink; ?>">Página Principal</a>
        <!-- <a href="<?php echo $pageTableLink; ?>">Página da Tabela</a> -->
        <a href="<?php echo $logoutLink; ?>">Logout</a>
    </nav>
</header>

