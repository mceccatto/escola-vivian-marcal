<?php
include $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
$conexao = conexao::getInstance();

$sql = '
SELECT A.*,
B.nome AS usuario_cadastro
FROM tb_campanhas A
JOIN tb_usuarios B
ON A.usuario = B.id
WHERE A.id = :id
';
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', (int)$_POST['id']);
$stm->execute();
$consulta = $stm->fetch(PDO::FETCH_OBJ);

$saida = '
<form id="form_editar_campanha" method="post">
    <div class="row">
        <div class="col-md-12">
			<div class="alert alert-danger d-none" role="alert" id="alerta_falha_editar"></div>
			<div class="alert alert-success d-none" role="alert" id="alerta_sucesso_editar"></div>
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-sm-12">
            <label for="campanhaTituloEditar" class="form-label">Título <i class="fas fa-asterisk align-top obrigatorio"></i></label>
            <input type="text" class="form-control shadow-none" id="campanhaTituloEditar" value="'.$consulta->titulo.'" required>
        </div>
        <div class="col-sm-6">
            <label for="campanhaInicioEditar" class="form-label">Data de início <i class="fas fa-asterisk align-top obrigatorio"></i></label>
            <input type="date" class="form-control shadow-none" id="campanhaInicioEditar" value="'.$consulta->data_inicio.'" required>
        </div>
        <div class="col-sm-6">
            <label for="campanhaTerminoEditar" class="form-label">Data de termino <i class="fas fa-asterisk align-top obrigatorio"></i></label>
            <input type="date" class="form-control shadow-none" id="campanhaTerminoEditar" value="'.$consulta->data_fim.'" required>
        </div>
        <div class="col-12">
            <label for="campanhaConteudoEditar" class="form-label">Conteúdo <i class="fas fa-asterisk align-top obrigatorio"></i></label>
            <textarea class="form-control shadow-none" id="campanhaConteudoEditar" required>'.$consulta->conteudo.'</textarea>
            <span class="float-end pt-1">Editado por '.$consulta->usuario_cadastro.' em '.date('d/m/Y \à\s H:i:s', strtotime($consulta->data_cadastro)).'</span>
        </div>
    </div>
    <button class="w-100 btn btn-verde btn-lg shadow-none" type="submit" id="atualizarCampanha"><i class="fas fa-sync-alt"></i> Atualizar Campanha</button>
</form>
<script>
    tinymce.init( {
        selector: "textarea#campanhaConteudoEditar",
        plugins: "autolink code image insertdatetime link lists media",
        menubar: "",
        toolbar: "fontsize bold italic underline strikethrough forecolor removeformat alignleft aligncenter alignright alignjustify outdent indent numlist bullist insertdatetime table image media link code",
        statusbar: false,
        relative_urls: false,
        remove_script_host: false,
        images_file_types: "gif,jpg,jpeg,png",
        image_advtab: true,
        images_upload_url: "../includes/upload.php",
        images_upload_handler: image_upload,
        height: 400,
    });

    $("#atualizarCampanha").on("click", function(event) {
        event.preventDefault();
        tinymce.triggerSave();
        campanhaIdEditar = '.$_POST['id'].';
        campanhaTituloEditar = $("#campanhaTituloEditar").val();
        campanhaInicioEditar = $("#campanhaInicioEditar").val();
		campanhaTerminoEditar = $("#campanhaTerminoEditar").val();
		campanhaConteudoEditar = $("#campanhaConteudoEditar").val();
        $("#alerta_falha_editar").empty();
		$("#alerta_sucesso_editar").empty();
        $.ajax( {
            url: "../includes/restrito/script-campanhas-editar.php",
			type: "POST",
            dataType: "json",
            async: true,
            data: {
                campanhaIdEditar:campanhaIdEditar,
                campanhaTituloEditar:campanhaTituloEditar,
                campanhaInicioEditar:campanhaInicioEditar,
                campanhaTerminoEditar:campanhaTerminoEditar,
                campanhaConteudoEditar:campanhaConteudoEditar
            },
            success: function(retorno) {
                if(retorno.status == "sucesso") {
                    //$("#form_editar_campanha").trigger("reset");
					$("#alerta_sucesso_editar").removeClass("d-none");
					$("#alerta_sucesso_editar").html(retorno.mensagem);
					setTimeout(function() {
						$("#alerta_sucesso_editar").addClass("d-none");
                        location.reload();
					},3000);
				} else {
					$("#alerta_falha_editar").removeClass("d-none");
					$("#alerta_falha_editar").html(retorno.mensagem);
					setTimeout(function() {
						$("#alerta_falha_editar").addClass("d-none");
					},3000);
				}
            }
        });
    });
	
	document.addEventListener("focusin", (e) => {
		if (e.target.closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
			e.stopImmediatePropagation();
		}
	});
</script>
';

echo $saida;
?>