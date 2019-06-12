<?php
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=blog_db;host=localhost';
$user = 'root';
$password = 'root';

try {
    $con = new PDO($dsn, $user, $password);

    $senha = md5(12345);
    $title = "Título do post";
    $post = "Esse post foi adicionado ao banco bd_post";
    $autor = "Matsunara tanada";
    $data = "2019/06/12 14:49:50";
    $id = 3;

    // $sql = "INSERT INTO posts SET titulo='$title', corpo='$post', autor='$autor', data_criado='$data', senha='$senha')";
    $sql = "SELECT * FROM posts";
    //$sql = $con->query($sql);
    foreach ($con->query($sql) as $value) {
        echo "Autor: ".$value['autor']." titulo: ".$value['titulo']."<br>";
    }

    /* Execute a prepared statement by binding PHP variables */

    $sql = $con->prepare('DELETE FROM posts WHERE id = :id');
    $sql->bindValue(':id', $id);
    // $sth->bindValue(':colour', $colour,);
    $sql->execute();

    echo "<br>Teste delete <br><br>";
    $sql = "SELECT * FROM posts";
    
    foreach ($con->query($sql) as $value) {
        echo "Autor: ".$value['autor']." titulo: ".$value['titulo']."<br>";
    }

    // echo "<br>Inserção realizada com sucesso.";
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDO</title>
</head>
<body>
    
</body>
</html>