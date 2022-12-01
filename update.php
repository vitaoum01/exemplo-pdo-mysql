<?php
require_once './vendor/autoload';

use ExemploPDOMySQL\MySQLConnection;

$bd = new MySQLConnection();

$genero = null;

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $comando = $bd->prepare('SELECT * FROM generos WHERE id = :id');
    $comando->execute([":id" => $_GET['id']]);

    $genero = $comando->fetch(PDO::FETCH_ASSOC);
}
else{
    $comando = $bd->prepare('UPDATE generos SET nome = :nome WHERE id = :id');
    $comando->execute([':nome' => $_POST['nome'], ':id' => $_POST['id']]);
}

header('Location:/index.php');


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Gênero</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
    <body>
        <main class="container">
        <h1>Editar Gênero</h1>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?= $genero['id'] ?>"
            <div class="form-group">
            <label for="nome">Nome do Gênero</label>
            <input class="form-control" type="text" required name="nome" value="<?= $genero['nome'] ?>"
            </div>
            <br />
            <a class="btn btn-secondary" href="index.php">Voltar</a>
            <button class="btn btn-sucess" type="submit">Salvar</button>
        </form>
    </main>
    </body>
</html>