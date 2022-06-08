    <div class="container py-5 d-none" id="container-alerta">
        <div class="alert alert-danger" role="alert" id="alerta"></div>
    </div>
	<div class="container py-5 d-none" id="container-sucesso">
        <div class="alert alert-success" role="alert" id="sucesso"></div>
    </div>
    <main class="form-signin py-5 mb-5">
        <form id="form_entrar" method="post">
            <i class="fas fa-user-shield mb-4 fa-3x"></i>
            <h1 class="h3 mb-3 fw-normal">Acesso Restrito</h1>
            <div class="form-floating">
                <input type="email" class="form-control shadow-sm" id="loginEmail" placeholder="...">
                <label for="loginEmail">Usuário</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control shadow-sm" id="loginSenha" placeholder="...">
                <label for="loginSenha">Senha</label>
            </div>
            <div class="d-grid gap-2 mb-5">
				<button class="btn btn-escola shadow-sm" id="entrar" type="submit"><i class="fas fa-sign-in-alt"></i> Entrar</button>
            </div>
        </form>
    </main>