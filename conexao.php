<?php

function conexao(){
    $host="localhost";
    $username="root";
    $password="";
    $database="alunos";
    $port="3306";

    $conn = mysqli_connect($host, $username, $password, $database, $port);

    return $conn;


}

?>