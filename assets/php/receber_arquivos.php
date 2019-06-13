<pre>
<?php

    if(isset($_FILES['myFile'])){
        // print_r($_FILES['myFile']);exit();
        if(count($_FILES['myFile']['tmp_name']) > 0){
            $arquivos = $_FILES['myFile']['name'];
            // print_r($arquivos);
            for ($i=0; $i < count($arquivos); $i++) { 
                move_uploaded_file($_FILES['myFile']['tmp_name'][$i],'../arquivos/'.separador($arquivos[$i]));
            }
        }
    }
    
    //renomeia um arquivo, retorna um novo nome juntamente do seu tipo;
    function separador($file){
        $file_array = explode(".", $file);
        if($file_array[1] === 'php'){
            return false;
        }
        // print_r($file_array);
        $novoNome = md5($file_array[0].time().rand(0,999)).'.'.$file_array[1];
        return $novoNome;
    }
?>
</pre>