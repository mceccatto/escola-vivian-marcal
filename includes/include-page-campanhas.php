    <?php
    $sql = "
    SELECT *
    FROM tb_campanhas
    WHERE status = 'A'
    ORDER BY id DESC
    ";
    $stm = $conexao->prepare($sql);
    $stm->execute();
    $consultaCampanhas = $stm->fetchAll(PDO::FETCH_OBJ);
    $contador = 0;
    ?>
    <div class="container py-5">
        <div class="row">
    		<div class="col-sm-12 col-md-12 col-lg-8 mb-3">
    			<div class="text-center">
    				<h1 class="fw-light mb-5">Campanhas</h1>
    			</div>
    		</div>
    		<div class="col-sm-12 col-md-12 col-lg-4 justify mb-3">
    			<div class="text-center">
    				<h1 class="fw-light mb-5"></h1>
    			</div>
    		</div>
    	</div>
        <div class="row">
            <div class="col-sm-12 mb-3">
            <?php if(!empty($consultaCampanhas)) : ?>
            <?php foreach($consultaCampanhas as $consultaCampanha) : ?>
                <?php if($contador++ % 2 === 0) : ?>
                <div class="row featurette">
                    <div class="col-md-7">
                        <h4 class="featurette-heading"><?php echo $consultaCampanha->titulo; ?></h4>
                        <?php echo $consultaCampanha->conteudo; ?>
                    </div>
                    <div class="col-md-5">
                        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="<?php echo $url; ?>/img/500x500.jpg" alt="">
                    </div>
                </div>
                <hr class="featurette-divider my-5">
                <?php else: ?>
                <div class="row featurette">
                    <div class="col-md-7 order-md-2">
                        <h4 class="featurette-heading"><?php echo $consultaCampanha->titulo; ?></h4>
                        <?php echo $consultaCampanha->conteudo; ?>
                    </div>
                    <div class="col-md-5 order-md-1">
                        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="<?php echo $url; ?>/img/500x500.jpg" alt="">
                    </div>
                </div>
                <hr class="featurette-divider my-5">
                <?php endif; ?>
            <?php endforeach; ?>
            <?php else: ?>
                <p>Não foi encontrada nenhuma campanha ativa.</p>
            <?php endif; ?>
            </div>
        </div>
    </div>