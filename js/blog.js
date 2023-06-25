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
    selector: "textarea#blogConteudo",
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


buscaBlog(1);
function buscaBlog(pagina, postagem = "") {
    acao = "busca";
    $.ajax( {
        url: "../includes/restrito/script-blog.php",
        method: "POST",
        data: {
            acao:acao,
            pagina:pagina,
            postagem:postagem
        },
        success: function(retorno){
            $("#retornoBuscaPostagem").html(retorno);
            //window.scrollTo(0,document.body.scrollHeight);
        }
    });
}

$(document).on("click", ".page-link", function() {
    var pagina = $(this).data("page_number");
    var postagem = $("#postagem").val();
    buscaBlog(pagina, postagem);
});

$("#postagem").keyup(function() {
    var postagem = $("#postagem").val();
    buscaBlog(1, postagem);
});

$("#publicar_blog").on("click", function(event) {
    event.preventDefault();
    tinymce.triggerSave();
    blogTitulo = $("#blogTitulo").val();
    blogClassificacao = $("#blogClassificacao").val();
    blogConteudo = $("#blogConteudo").val();
    acao = "publicar_blog";
    $("#alerta_falha").empty();
    $("#alerta_sucesso").empty();
    window.scrollTo(0,0);
    if(blogTitulo == "") {
        $("#alerta_falha").removeClass("d-none");
        $("#alerta_falha").html("É obrigatório conter um TÍTULO para a postagem!");
        setTimeout(function() {
            $("#alerta_falha").addClass("d-none");
        },3000);
        return false;
    }
    if(blogClassificacao == 0) {
        $("#alerta_falha").removeClass("d-none");
        $("#alerta_falha").html("É obrigatório conter uma CLASSIFICAÇÃO para a postagem!");
        setTimeout(function() {
            $("#alerta_falha").addClass("d-none");
        },3000);
        return false;
    }
    if(blogConteudo == "") {
        $("#alerta_falha").removeClass("d-none");
        $("#alerta_falha").html("É obrigatório conter um CONTEÚDO para a postagem!");
        setTimeout(function() {
            $("#alerta_falha").addClass("d-none");
        },3000);
        return false;
    }
    $.ajax( {
        type: "POST",
        dataType: "json",
        url: "../includes/restrito/script-blog.php",
        async: true,
        data: {
            acao:acao,
            blogTitulo:blogTitulo,
            blogClassificacao:blogClassificacao,
            blogConteudo:blogConteudo
        },
        success: function(retorno) {
            if(retorno.status == "sucesso") {
                $("#form_novo_blog").trigger("reset");
                $("#alerta_sucesso").removeClass("d-none");
                $("#alerta_sucesso").html(retorno.mensagem);
                setTimeout(function() {
                    $("#alerta_sucesso").addClass("d-none");
                    buscaBlog(1);
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