<?php

$servidor = "localhost";
$username = "root";
$senha = "";
$database = "faeterj3dawmanha2";
$conn = new mysqli($servidor, $username, $senha, $database);
if ($conn->connect_error) {
    die("Conexao Falhou, avise o administrador do sistema");
}