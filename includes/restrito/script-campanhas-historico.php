<?php

include $_SERVER['DOCUMENT_ROOT'].'/includes/classes/campanha.php';
include $_SERVER['DOCUMENT_ROOT'].'/includes/session.php';

if(isset($_POST)) {
    $id = (isset($_POST['id']) && $_POST['id'] != null) ? $_POST['id'] : null;

    $sql = '
    SELECT A.*,
    B.nome
    FROM tb_campanhas_logs A
    JOIN tb_usuarios B
    ON B.id = A.usuario
    WHERE A.id = :id
    ';
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':id', $id);
    $stm->execute();
    $consultaHistoricos = $stm->fetchAll(PDO::FETCH_OBJ);

    $contador = 0;

    foreach($consultaHistoricos as $consultaHistorico) {
        $contador = $contador + 1;
        echo '
        <div class="accordion" id="accordionHistorico'.$contador.'">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading'.$contador.'">
                    <button class="accordion-button collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse'.$contador.'" aria-expanded="false" aria-controls="flush-collapseOne">
                        '.$consultaHistorico->nome.' ('.date('d/m/Y \a\s H:i:s', strtotime($consultaHistorico->data_cadastro)).')
                    </button>
                </h2>
                <div id="flush-collapse'.$contador.'" class="accordion-collapse collapse" aria-labelledby="flush-heading'.$contador.'" data-bs-parent="#accordionHistorico'.$contador.'">
                    <div class="accordion-body">
                        <strong>TÍTULO</strong>
                        <p>'.$consultaHistorico->titulo.'</p>
                        <strong>DATA INÍCIO</strong>
                        <p>'.$consultaHistorico->data_inicio.'</p>
                        <strong>DATA TERMINO</strong>
                        <p>'.$consultaHistorico->data_fim.'</p>
                        <strong>STATUS (A = ATIVO / I = INATIVO)</strong>
                        <p>'.$consultaHistorico->status.'</p>
                        <strong>CONTEÚDO</strong>
                        '.$consultaHistorico->conteudo.'
                    </div>
                </div>
            </div>
        </div>
        ';
    }
}
?>