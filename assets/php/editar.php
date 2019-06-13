<?php
    require('./config.php');
        
    if(isset($_POST['nome'])){

        if(!empty($_POST['nome']) && $_POST['nome'] != " "){

            $nome =  addSlashes($_POST['nome']);
            $email = addSlashes($_POST['email']);
            $id = addSlashes($_GET['id']);
            
            $sql = "UPDATE usuarios  SET nome='$nome', email='$email' WHERE id='$id'";

            $res = $pdo->query($sql);

            if($res){
                header("Location: ../../index.php"); 
            }else{
                echo "Ocorreu erro!";
            }
        }else{
            header("Location: ../../index.php"); 
        }
    }

    if(isset($_GET['id']) && !empty($_GET['id'])){

        $id = $_GET['id'];
        
        $sql = "SELECT * FROM usuarios WHERE id='$id'";
        $resp = $pdo->query($sql);

        if($resp->rowCount() > 0){
            $resp = $resp->fetch();
        }else{
            header("Location: ../../index.php"); 
        }

    }else{
        header("Location: ../../index.php");
    }
    
?>

<h2>Editar Usuário</h2>
<form method="post">
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome-form" size="50" value="<?php echo $resp['nome'];?>"><br><br>

    <label for="nome">Email</label>
    <input type="email" name="email" id="email-form" size="50" value="<?php echo $resp['email'];?>"><br><br>
    
    <input type="submit" value="Editar">
    <a href="../../index.php">Voltar</a>
</form>