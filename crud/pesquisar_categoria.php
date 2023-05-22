<?php
include_once('testeconexao.php');
if ($_POST) {
    $id = $_POST['txtID'];
    try {
        $sql = $conn->query('select * from categoria where id_categoria =' . $id);
        if ($sql->rowcount() >= 1) {
            foreach ($sql as $row) {
                echo "<p>ID: $row[0]</p>";
                echo "<p>Nome: $row[1]</p>";
                echo "<p>Observação: $row [2]</p>";
                echo "<p>Status: $row[3]</p>";
            }
        } else {
            echo '<p>Categoria Inexistente!</p>';
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
} else
{
    header('location:tela_categoria.php');
}
?>
<hr>
<a href="tela_categoria">Voltar</a>