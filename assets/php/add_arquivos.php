<!-- enviando varios arquivos -->
<h3>Adicionar Arquivos</h3>
<form action="receber_arquivos.php" method="post" enctype="multipart/form-data">
    <input type="file" name="myFile[]" multiple>
    <br><br>
    <input type="submit" value="Enviar">
</form>