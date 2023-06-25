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
    		<div class="col-sm-12 col-md-12 col-lg-12 justify mb-3">
				<?php if(!empty($consultaCampanhas)) : ?>
				<?php foreach($consultaCampanhas as $consultaCampanha) : ?>
				<div class="card mb-3">
    				<div class="row g-0">
    					<div class="col-md-12">
    						<div class="card-body card-campanha">
    							<h5 class="card-title"><?php echo $consultaCampanha->titulo; ?></h5>
    							<p class="card-text"><?php echo $consultaCampanha->conteudo; ?></p>
    						</div>
    					</div>
    				</div>
    			</div>
				<?php endforeach; ?>
				<?php else: ?>
					<p>Não foi encontrada nenhuma campanha ativa.</p>
				<?php endif; ?>
    		</div>
    	</div>
    </div>