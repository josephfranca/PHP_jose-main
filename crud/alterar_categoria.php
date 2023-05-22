<?php
include_once('testeconexao.php');
if ($_POST) {
    $id = $_POST['txtID'];

    try {
        $sql = $conn->query("
        select * from categoria where id_categoria = $id");
        if ($sql->rowcount()>=1)
        {
         echo '<p>Os Dados foram alterados com Sucesso!</p>';
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    
}
else{
    header('location:tela_categoria.php');
}
?>
<hr>
<a href="tela_categoria">Voltar</a>