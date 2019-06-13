<?php
    session_start();
    require('./config.php');
        
    if(isset($_POST['nome'])){

        if(!empty($_POST['nome']) && $_POST['nome'] != " "){

            $nome =  addSlashes($_POST['nome']);
            $senha = md5(addSlashes($_POST['senha']));
            
            $sql = "SELECT  id, nome FROM usuarios WHERE nome='$nome' AND senha='$senha'";

            $res = $pdo->query($sql);
            
            if($res->rowCount() > 0){
                $result = $res->fetch();
                print_r($result);
                $_SESSION['id'] = $result['id'];
                $_SESSION['nome'] = $result['nome'];
                // echo $_SESSION['nome'];
                // echo $_SESSION['id'];
                header("Location: ../../index.php"); 
            }else{
                echo "Verifique seu login ou senha.";
            }
        }
    }
    
?>

<h2>Fazer Login</h2>
<form method="post">
    <label for="nome">Nome</label>
    <input type="text" name="nome" size="50" id="nome-form" ><br><br>
    
    <label for="senha">Senha</label>
    <input type="password" name="senha" size="50" id="senha-form"><br><br>
    
    <input type="submit" value="Entrar">

</form>
