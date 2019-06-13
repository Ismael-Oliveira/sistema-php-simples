<?php
    require('./config.php');
        
    if(isset($_POST['nome'])){

        if(!empty($_POST['nome']) && $_POST['nome'] != " "){

            $nome =  addSlashes($_POST['nome']);
            $email = addSlashes($_POST['email']);
            $senha = md5(addSlashes($_POST['senha']));
            
            $sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = '$senha'";

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
    
?>

<h2>Formulário</h2>
<form method="post">
    <label for="nome">Nome</label>
    <input type="text" name="nome" size="50" id="nome-form" ><br><br>

    <label for="nome">Email</label>
    <input type="email" name="email" size="50" id="email-form"><br><br>
    
    <label for="senha">Senha</label>
    <input type="password" name="senha" size="50" id="senha-form"><br><br>
    
    <input type="submit" value="Cadastrar">
    <a href="../../index.php">Voltar</a>
</form>