<?php
include_once 'DbConection.php';
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Listar Perguntas</h1>
        <br>
        <a href="ClienteNovo.html">Inserir Cliente</a><br>
        <a href="ClienteListar.php">Listar Clientes</a><br>
        <br>
        <table border="1px">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Codigo Postal</th>
                <th>Pais</th>
                <th>CPF</th>
                <th>Passaporte</th>
                <th>E-mail</th>
                <th>Data Nascimento</th>
                <th>Ações</th>
            </tr>
            <?php
            $comandoSQL = "SELECT * FROM `Clientes`";
            $resultado = $conn->query($comandoSQL);
            While ($linha = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $linha["id"] . "</td>";
                echo "<td>" . $linha["nome"] . "</td>";
                echo "<td>" . $linha["endereco"] . "</td>";
                echo "<td>" . $linha["codigoPostal"] . "</td>";
                echo "<td>" . $linha["pais"] . "</td>";
                echo "<td>" . $linha["cpf"] . "</td>";
                echo "<td>" . $linha["passaporte"] . "</td>";
                echo "<td>" . $linha["email"] . "</td>";
                echo "<td>" . $linha["dataNascimento"] . "</td>";
                echo "<td><a href='ClienteAlterar.html?id=" . $linha["id"] . "'>Alterar</a> | "
                . "<a href='ClienteRemover.html?id=" . $linha["id"] . "'>Remover</a> | "
                . "<a href='ClienteDetalhes.html?id=" . $linha["id"] . "'>Detalhe</a> | ";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>