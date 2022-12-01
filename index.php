<?php
require_once './vendor/autoload.php';
use ExemploPDOMySQL\MySQLConnection; //PDO

$bd = new MySQLConnection(); //PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');

$comando = $bd->prepare('SELECT * FROM generos');
$comando->execute();
$generos = $comando->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Biblioteca</title>
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
        <main class="container">
        <a href="insert.php" class="btn btn-primary">Novo Gênero</a>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach($generos as $g): ?>
                <tr>
                    <td><?= $g['id'] ?></td>
                    <td><?= $g['nome'] ?></td>
                    <td>
                        <a class="btn btn-secondary" href="update.php?id=<?= $g['id'] ?>">Editar</a>
                        <a class="btn btn-danger" href="delet.php?id=<?= $g['id'] ?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
        </main>
    </body>