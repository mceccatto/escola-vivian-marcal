<?php

include $_SERVER['DOCUMENT_ROOT'].'/includes/classes/campanha.php';
$conexao = conexao::getInstance();

if(isset($_POST)) {
    $id = (isset($_POST['id']) && $_POST['id'] != null) ? $_POST['id'] : null;

    $sql = '
    SELECT id,status
    FROM tb_campanhas
    WHERE id = :id
    ';
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':id', (int)$id);
    $stm->execute();
    $consulta = $stm->fetch(PDO::FETCH_OBJ);

    if($consulta->status === 'A') {
        $status = 'I';
    } else {
        $status = 'A';
    }

    $statusCampanha = new campanhaExecucoes();
    if(!$statusCampanha->status($id,$status)) {
        $json = array('status' => 'falha');
        echo json_encode($json);
    } else {
        if($status === 'I') {
            $json = array(
                'id' => $id,
                'status' => 'A'
            );
        } else {
            $json = array(
                'id' => $id,
                'status' => 'I'
            );
        }
        echo json_encode($json);
    }
}

?>