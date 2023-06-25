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