<?php

    require("./assets/php/config.php");
    require("./assets/php/sessao.php");

    $sql = "SELECT * FROM usuarios";
    $res = $pdo->query($sql);

?>

<link " rel="stylesheet" href="./assets/css/style.css">
<div class="div">
    <h3>Utilizador: <?php echo $_SESSION['nome']?></h3><a href="assets/php/sair.php">-- SAIR</a>
</div>
<a class="add" href="./assets/php/adicionar.php">Adicionar Usuário</a>
<table border="1" width="80%" align="center">
    <tr>
        <th>Nome</th>    
        <th>Email</th>    
        <th>Ações</th>    
    </tr>

    <tbody>
        
        <?php
            if($res->rowCount() > 0){
                foreach ($res as $value) {
                    echo "<tr align='center'>";
                        echo "<td>".$value['nome']."</td>";
                        echo "<td>".$value['email']."</td>";
                        echo '<td><a href="./assets/php/editar.php?id='.$value['id'].'">Editar</a>
                                -- <a href="./assets/php/deletar.php?id='.$value['id'].'">Deletar</a></td>';
                    echo "</tr>";
                }

            }
        ?>

    </tbody>
</table>
