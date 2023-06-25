const image_upload = (blobInfo, progress) => new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.open("POST", "../includes/upload.php");
    xhr.upload.onprogress = (e) => {
        progress(e.loaded / e.total * 100);
    };
    xhr.onload = () => {
        if (xhr.status === 403) {
            reject({ message: "HTTP Error: " + xhr.status, remove: true });
            return;
        }
        if (xhr.status < 200 || xhr.status >= 300) {
            reject("HTTP Error: " + xhr.status);
            return;
        }
        const json = JSON.parse(xhr.responseText);
        if (!json || typeof json.location != "string") {
            reject("Invalid JSON: " + xhr.responseText);
            return;
        }
        resolve(json.location);
    };
    xhr.onerror = () => {
        reject("Image upload failed due to a XHR Transport error. Code: " + xhr.status);
    };
    const formData = new FormData();
    formData.append("file", blobInfo.blob(), blobInfo.filename());
    xhr.send(formData);
});

tinymce.init( {
    selector: "textarea#campanhaConteudo",
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


buscaCampanhas(1);
function buscaCampanhas(pagina, campanha = "") {
    acao = "busca";
    $.ajax( {
        url: "../includes/restrito/script-campanhas.php",
        method: "POST",
        data: {
            acao:acao,
            pagina:pagina,
            campanha:campanha
        },
        success: function(retorno){
            $("#retornoBuscaCampanhas").html(retorno);
            //window.scrollTo(0,document.body.scrollHeight);
        }
    });
}

$(document).on("click", ".page-link", function() {
    var pagina = $(this).data("page_number");
    var campanha = $("#campanha").val();
    buscaCampanhas(pagina, campanha);
});

$("#campanha").keyup(function() {
    var campanha = $("#campanha").val();
    buscaCampanhas(1, campanha);
});

$("#publicar_campanha").on("click", function(event) {
    event.preventDefault();
    acao = "publicar_campanha";
	tinymce.triggerSave();
    campanhaTitulo = $("#campanhaTitulo").val();
    campanhaInicio = $("#campanhaInicio").val();
	campanhaTermino = $("#campanhaTermino").val();
	campanhaConteudo = $("#campanhaConteudo").val();
    $("#alerta_falha").empty();
	$("#alerta_sucesso").empty();
    window.scrollTo(0,0);
    if(campanhaTitulo == "") {
        $("#alerta_falha").removeClass("d-none");
        $("#alerta_falha").html("É obrigatório conter um TÍTULO para a campanha!");
        setTimeout(function() {
            $("#alerta_falha").addClass("d-none");
        },3000);
        return false;
    }
    if(campanhaInicio == "") {
        $("#alerta_falha").removeClass("d-none");
        $("#alerta_falha").html("É obrigatório conter uma DATA DE INÍCIO para a campanha!");
        setTimeout(function() {
            $("#alerta_falha").addClass("d-none");
        },3000);
        return false;
    }
	if(campanhaTermino == "") {
        $("#alerta_falha").removeClass("d-none");
        $("#alerta_falha").html("É obrigatório conter uma DATA DE TERMINO para a campanha!");
        setTimeout(function() {
            $("#alerta_falha").addClass("d-none");
        },3000);
        return false;
    }
	if(campanhaConteudo == "") {
        $("#alerta_falha").removeClass("d-none");
        $("#alerta_falha").html("É obrigatório conter um CONTEÚDO para a campanha!");
        setTimeout(function() {
            $("#alerta_falha").addClass("d-none");
        },3000);
        return false;
    }
    $.ajax( {
        type: "POST",
        dataType: "json",
        url: "../includes/restrito/script-campanhas.php",
        async: true,
        data: {
            acao:acao,
            campanhaTitulo:campanhaTitulo,
            campanhaInicio:campanhaInicio,
			campanhaTermino:campanhaTermino,
			campanhaConteudo:campanhaConteudo
        },
        success: function(retorno) {
			if(retorno.status == "sucesso") {
                $("#form_nova_campanha").trigger("reset");
				$("#alerta_sucesso").removeClass("d-none");
				$("#alerta_sucesso").html(retorno.mensagem);
				setTimeout(function() {
					$("#alerta_sucesso").addClass("d-none");
                    buscaCampanhas(1);
				},3000);
			} else {
				$("#alerta_falha").removeClass("d-none");
				$("#alerta_falha").html(retorno.mensagem);
				setTimeout(function() {
					$("#alerta_falha").addClass("d-none");
				},3000);
			}
        }
    });
});