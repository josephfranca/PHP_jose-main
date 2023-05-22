<?php
include_once('testeconexao.php');

if ($_POST) {
    if (
        empty($_POST['txtnome']) ||
        empty($_POST['txtStatus']) ||
        empty($_POST['txtOBS'])
    ) {
        echo '<p>Erro! preencha todos os campos para cadastrar a categoria</p>';
    } else {
        $nome = $_POST['txtnome'];
        $status = $_POST['txtStatus'];
        $obs = $_POST['txtOBS'];
    }
    try {
        $sql = $conn->prepare("
        insert into categoria(
            nome_categoria,
            obs_categoria,
            status_categoria
        )
        values(
            :nome_categoria,
            :obs_categoria,
            :status_categoria
            
        )
        ");
        $sql->execute(
            array(
                ':nome_categoria' => $nome,
                ':obs_categoria' => $obs,
                'status_categoria' => $status
            )
        );
        if ($sql->rowcount() >= 1) {
            echo '<p>Os dados foram cadastrados com Sucesso!!</p>';
            echo '<p>ID Gerado: ' . $conn->lastinsertid() . ' </p>';
        } else {
            echo '<p>Algo deu errado no cadastro!</p>';
        }

    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }

}
else
{
    header('location:tela_categoria.php');
}
?>
<hr>
<a href="tela_categoria.php">Voltar</a>