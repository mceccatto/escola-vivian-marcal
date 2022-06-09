<?php
include $_SERVER['DOCUMENT_ROOT'].'/includes/config.php';
include $_SERVER['DOCUMENT_ROOT'].'/includes/session.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/include-head.php'; ?>

<body>

    <div id="loader" class="center"></div>
	<div id="esconder" class="esconder">

        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/restrito"><i class="fas fa-user-shield"></i> Administração</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="w-100"></div>
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                    <a class="nav-link deslogar px-3" href="#" id="deslogar"><i class="fas fa-sign-out-alt"></i> Deslogar</a>
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row">

                <?php
                if (isset($_GET['page'])) {
                    if ($_GET['page'] == 'dashboard') {
                        $activeDashboard = 'active';
                    } elseif ($_GET['page'] == 'doacoes') {
                        $activeDoacoes = 'active';
                    } elseif ($_GET['page'] == 'campanhas') {
                        $activeCampanhas = 'active';
                    } elseif ($_GET['page'] == 'blog') {
                        $activeBlog = 'active';
                    } elseif ($_GET['page'] == 'galeria') {
                        $activeGaleria = 'active';
                    } elseif ($_GET['page'] == 'parametros-gerais') {
                        $activeParametros = 'active';
                    } elseif ($_GET['page'] == 'usuarios') {
                        $activeUsuarios = 'active';
                    } elseif ($_GET['page'] == 'perfil') {
                        $activePerfil = 'active';
                    }
                } else {
                    $activeDashboard = 'active';
                }
                ?>
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link <?php echo @$activeDashboard; ?>" aria-current="page" href="<?php echo $url; ?>/restrito/?page=dashboard">
                                    <i class="fas fa-chart-line feather"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo @$activeDoacoes; ?>" href="<?php echo $url; ?>/restrito/?page=doacoes">
                                    <i class="fas fa-hand-holding-usd feather"></i>
                                    Doações
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo @$activeCampanhas; ?>" href="<?php echo $url; ?>/restrito/?page=campanhas">
                                    <i class="fas fa-heart feather"></i>
                                    Campanhas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo @$activeBlog; ?>" href="<?php echo $url; ?>/restrito/?page=blog">
                                    <i class="fab fa-microblog feather"></i>
                                    Blog
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo @$activeGaleria; ?>" href="<?php echo $url; ?>/restrito/?page=galeria">
                                    <i class="fas fa-images feather"></i>
                                    Galeria
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo @$activeParametros; ?>" href="<?php echo $url; ?>/restrito/?page=parametros-gerais">
                                    <i class="fab fa-whmcs feather"></i>
                                    Parâmetros Gerais
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo @$activeUsuarios; ?>" href="<?php echo $url; ?>/restrito/?page=usuarios">
                                    <i class="fas fa-user feather"></i>
                                    Usuários
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo @$activePerfil; ?>" href="<?php echo $url; ?>/restrito/?page=perfil">
                                    <i class="fas fa-user-cog feather"></i>
                                    Perfil
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <?php
                    if (isset($_GET['page'])) {
                        if ($_GET['page'] == 'dashboard') {
                            include $_SERVER['DOCUMENT_ROOT'].'/includes/restrito/include-page-dashboard.php';
                        } elseif ($_GET['page'] == 'doacoes') {
                            include $_SERVER['DOCUMENT_ROOT'].'/includes/restrito/include-page-doacoes.php';
                        } elseif ($_GET['page'] == 'campanhas') {
                            include $_SERVER['DOCUMENT_ROOT'].'/includes/restrito/include-page-campanhas.php';
                        } elseif ($_GET['page'] == 'blog') {
                            include $_SERVER['DOCUMENT_ROOT'].'/includes/restrito/include-page-blog.php';
                        } elseif ($_GET['page'] == 'galeria') {
                            include $_SERVER['DOCUMENT_ROOT'].'/includes/restrito/include-page-galeria.php';
                        } elseif ($_GET['page'] == 'parametros-gerais') {
                            include $_SERVER['DOCUMENT_ROOT'].'/includes/restrito/include-page-parametros-gerais.php';
                        } elseif ($_GET['page'] == 'usuarios') {
                            include $_SERVER['DOCUMENT_ROOT'].'/includes/restrito/include-page-usuarios.php';
                        } elseif ($_GET['page'] == 'perfil') {
                            include $_SERVER['DOCUMENT_ROOT'].'/includes/restrito/include-page-perfil.php';
                        }
                    } else {
                        include $_SERVER['DOCUMENT_ROOT'].'/includes/restrito/include-page-dashboard.php';
                    }
                    ?>

                </main>
            </div>

            <?php include $_SERVER['DOCUMENT_ROOT'].'/includes/include-footer.php'; ?>

        </div>

    </div>

</body>
<script src="<?php echo $url; ?>/frameworks/bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url; ?>/frameworks/fontawesome-free-5.15.4/js/all.min.js"></script>
<script src="<?php echo $url; ?>/frameworks/jquery/jquery-3.6.0.min.js"></script>
<script>
document.onreadystatechange = function() {
	if (document.readyState !== 'complete') {
		document.querySelector('body').style.visibility = 'hidden';
		document.querySelector('#esconder').style.visibility = 'hidden';
		document.querySelector('#loader').style.visibility = 'visible';
	} else {
		document.querySelector('#loader').style.display = 'none';
		document.querySelector('#esconder').style.visibility = 'visible';
		document.querySelector('body').style.visibility = 'visible';
	}
};
$(document).ready(function() {
    $("#deslogar").on("click", function(event) {
		event.preventDefault();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../includes/deslogar.php",
            async: true,
            success: function(retorno) {
				if(retorno.status == "sucesso") {
					location.reload();
				}
            }
        });
    });
});
</script>
<?php
if (isset($_GET['page'])) {
    if ($_GET['page'] == 'dashboard') {
        echo '';
    } elseif ($_GET['page'] == 'doacoes') {
        echo '';
    } elseif ($_GET['page'] == 'campanhas') {
        echo '<script src="' . $url . '/frameworks/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script>
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
</script>
';
    } elseif ($_GET['page'] == 'blog') {
        echo '<script src="' . $url . '/frameworks/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
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
            $.ajax( {
                url: "../includes/restrito/script-campanhas-buscar.php",
                method: "POST",
                data: {
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
                url: "../includes/restrito/script-campanhas-nova.php",
                async: true,
                data: {
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
        </script>';
    } elseif ($_GET['page'] == 'galeria') {
        echo '';
    } elseif ($_GET['page'] == 'parametros-gerais') {
        echo '
<script>
var _URL = window.URL || window.webkitURL;
$("#logo").change(function(e) {
    $("#previaLogo").addClass("d-none");
    var file, img;
    if((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
            if(this.width != 170 || this.height != 170) {
                alert("Logo com resolução incorreta!");
                $("#logo").val(null);
                return false;
            }
            if(file.type != "image/png" && file.type != "image/jpg" && file.type != "image/jpeg") {
                alert("Logo com formato incorreto!");
                $("#logo").val(null);
                return false;
            }
            $("#previaLogo").attr("src",_URL.createObjectURL(file));
            $("#previaLogo").removeClass("d-none");
        };
        img.onerror = function() {
            alert("O formato da imagem enviada não é válido.");
            $("#logo").val(null);
            return false;
        };
        img.src = _URL.createObjectURL(file);
    }
});
$("#banner1").change(function(e) {
    $("#previaBanner1").addClass("d-none");
    var file, img;
    if((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
            if(this.width != 1920 || this.height != 600) {
                alert("Banner 01 com resolução incorreta!");
                $("#banner1").val(null);
                return false;
            }
            if(file.type != "image/png" && file.type != "image/jpg" && file.type != "image/jpeg") {
                alert("Banner 01 com formato incorreto!");
                $("#banner1").val(null);
                return false;
            }
            $("#previaBanner1").attr("src",_URL.createObjectURL(file));
            $("#previaBanner1").removeClass("d-none");
        };
        img.onerror = function() {
            alert("O formato da imagem enviada não é válido.");
            $("#banner1").val(null);
            return false;
        };
        img.src = _URL.createObjectURL(file);
    }
});
$("#banner2").change(function(e) {
    $("#previaBanner2").addClass("d-none");
    var file, img;
    if((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
            if(this.width != 1920 || this.height != 600) {
                alert("Banner 02 com resolução incorreta!");
                $("#banner2").val(null);
                return false;
            }
            if(file.type != "image/png" && file.type != "image/jpg" && file.type != "image/jpeg") {
                alert("Banner 02 com formato incorreto!");
                $("#banner2").val(null);
                return false;
            }
            $("#previaBanner2").attr("src",_URL.createObjectURL(file));
            $("#previaBanner2").removeClass("d-none");
        };
        img.onerror = function() {
            alert("O formato da imagem enviada não é válido.");
            $("#banner2").val(null);
            return false;
        };
        img.src = _URL.createObjectURL(file);
    }
});
$("#banner3").change(function(e) {
    $("#previaBanner3").addClass("d-none");
    var file, img;
    if((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
            if(this.width != 1920 || this.height != 600) {
                alert("Banner 03 com resolução incorreta!");
                $("#banner3").val(null);
                return false;
            }
            if(file.type != "image/png" && file.type != "image/jpg" && file.type != "image/jpeg") {
                alert("Banner 03 com formato incorreto!");
                $("#banner3").val(null);
                return false;
            }
            $("#previaBanner3").attr("src",_URL.createObjectURL(file));
            $("#previaBanner3").removeClass("d-none");
        };
        img.onerror = function() {
            alert("O formato da imagem enviada não é válido.");
            $("#banner3").val(null);
            return false;
        };
        img.src = _URL.createObjectURL(file);
    }
});

$("#formParametrosGerais").on("submit", function(event) {
    event.preventDefault();
    $("#alerta_alerta").empty();
    $("#alerta_alerta").addClass("d-none");
    if($("#nomeWebsite").val() == "") {
        $("#alerta_alerta").removeClass("d-none");
		$("#alerta_alerta").html("É obrigatório informar um nome para o website.");
        window.scrollTo(0,0);
        return false;
    }
    $.ajax( {
        type: "POST",
        dataType: "json",
        url: "../includes/restrito/script-parametros-gerais.php",
        async: true,
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend : function() {
            $("#alerta_alerta").removeClass("d-none");
			$("#alerta_alerta").html("Aguarde...");
            window.scrollTo(0,0);
        },
        success: function(retorno) {
            $("#alerta_alerta").empty();
            $("#alerta_alerta").addClass("d-none");
            if(retorno.status == "sucesso") {
                $("#alerta_sucesso").removeClass("d-none");
                $("#alerta_sucesso").html(retorno.mensagem);
            } else {
                $("#alerta_falha").removeClass("d-none");
                if(retorno.status == "logo") {
                    $("#alerta_falha").html(retorno.mensagem);
                } else if(retorno.status == "banner1") {
                    $("#alerta_falha").html(retorno.mensagem);
                } else if(retorno.status == "banner2") {
                    $("#alerta_falha").html(retorno.mensagem);
                } else if(retorno.status == "banner3") {
                    $("#alerta_falha").html(retorno.mensagem);
                } else if(retorno.status == "falha") {
                    $("#alerta_falha").html(retorno.mensagem);
                }
            }
        }
    });
});
</script>
        ';
    } elseif ($_GET['page'] == 'usuarios') {
        echo '';
    } elseif ($_GET['page'] == 'perfil') {
        echo '';
    }
}
?>

</html>