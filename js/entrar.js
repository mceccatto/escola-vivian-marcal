$(document).ready(function() {
    $("#entrar").on("click", function(event) {
        event.preventDefault();
        email = $("#loginEmail").val();
        senha = $("#loginSenha").val();
        $("#alerta").empty();
        if(email == "") {
            $("#container-alerta").removeClass("d-none");
            $("#alerta").html("O campo USUÁRIO é obrigatório");
            setTimeout(function() {
                $("#container-alerta").addClass("d-none");
            },3000);
            return false;
        }
        if(senha == "") {
            $("#container-alerta").removeClass("d-none");
            $("#alerta").html("O campo SENHA é obrigatório");
            setTimeout(function() {
                $("#container-alerta").addClass("d-none");
            },3000);
            return false;
        }
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "includes/entrar.php",
            async: true,
            data: {
                email:email,
                senha:senha
            },
            success: function(retorno) {
                if(retorno.status == "sucesso") {
                    $("#container-sucesso").removeClass("d-none");
                    $("#sucesso").html(retorno.mensagem);
                    setTimeout(function() {
                        window.location.href = "/restrito";
                    },3000);
                } else {
                    $("#container-alerta").removeClass("d-none");
                    $("#alerta").html(retorno.mensagem);
                    setTimeout(function() {
                        $("#container-alerta").addClass("d-none");
                    },3000);
                }
            }
        });
    });
});