<?php

include_once 'DbConection.php';

//adiciona novo cliente no banco de dados
if (isset($_GET['acao']) && $_GET['acao'] == "adicionar") {
    if (!isset($_GET['nome']) || !isset($_GET['endereco']) || !isset($_GET['codigoPostal']) || !isset($_GET['pais']) || !isset($_GET['cpf']) || !isset($_GET['passaporte']) || !isset($_GET['email']) || !isset($_GET['dataNascimento'])) {
        echo json_encode(['status' => 'Alguns campos estão vazios, verifique seu formulário']);
    } else {
        extract($_GET);
        $comandoSQL = "INSERT INTO `clientes`(`nome`, `endereco`, `codigoPostal`, `pais`, `cpf`, `passaporte`, `email`, `dataNascimento`) VALUES "
                . "('$nome','$endereco','$codigoPostal','$pais','$cpf','$passaporte','$email','$dataNascimento')";
        $result = $conn->query($comandoSQL);
        echo json_encode(['status' => 'Sucesso ao inserir o Novo Cliente']);
    }
}

//busca dados do cliente
if (isset($_GET['acao']) && $_GET['acao'] == "buscar") {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $comandoSQL = "SELECT * FROM `Clientes` where id = " . $_GET['id'];
        $resultado = $conn->query($comandoSQL);
        $linha = $resultado->fetch_assoc();
        echo json_encode(['status' => $linha]);
    } else {
        echo json_encode(['status' => 'Identificador de cliente invalido']);
    }
}

//atualiza os dados do cliente
if (isset($_GET['acao']) && $_GET['acao'] == "atualizar") {
    if (!isset($_GET['id']) || !isset($_GET['nome']) || !isset($_GET['endereco']) || !isset($_GET['codigoPostal']) || !isset($_GET['pais']) || !isset($_GET['cpf']) || !isset($_GET['passaporte']) || !isset($_GET['email']) || !isset($_GET['dataNascimento'])) {
        echo json_encode(['status' => 'Alguns campos estão vazios ou tem informação inválida, verifique seu formulário']);
    } else {
        extract($_GET);
        $comandoSQL = "UPDATE `clientes` SET "
                . "`nome` = '$nome' , `endereco` = '$endereco', `codigoPostal`= '$codigoPostal', `pais`= '$pais'"
                . ", `cpf` = '$cpf', `passaporte` = '$passaporte', `email`= '$email', `dataNascimento` = '$dataNascimento' "
                . "WHERE id = " . $_GET['id'];
        $result = $conn->query($comandoSQL);
        echo json_encode(['status' => 'Sucesso ao alterar os dados do Cliente']);
    }
}

//remove os dados do cliente
if (isset($_GET['acao']) && $_GET['acao'] == "remover") {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $comandoSQL = "DELETE FROM `clientes` WHERE `id` = " . $_GET['id'];
        $result = $conn->query($comandoSQL);
        echo json_encode(['status' => 'Sucesso ao remover o Cliente']);
    } else {
        echo json_encode(['status' => 'Não foi possivel remover. Sua requisição não contem um Id valido']);
    }
}