<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";

$usuarioController = new UsuarioController();
$usuarioController->cadastrarUsuario();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/js/main.js"></script>

    <title>BuscaTec- Cadastro</title>
</head>

<body id="principal">

    <div id="login">

        <div class="caixa">

            <img src="/assets/img/a.png" alt="">
            <h1>Cadastrar</h1><br>
            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="tecnicoCheckbox" name="tipoCadastro" value="tecnico">
                                <label class="form-check-label" for="tecnicoCheckbox">
                                    Técnico
                                </label>
                            </div>

            <form action="cadastrar.php" method="post">

                <div class="name">
                    <input type="text" name="nome" id="nome" placeholder="Nome" required>
                </div>

                <div class="cpf">
                    <input type="text" class="cpf" name="cpf" id="cpf" placeholder="CPF" maxlength="14">
                </div>

                <div class="telefone">
                    <input type="text" class="telefone" name="telefone" id="telefone" placeholder="Telefone/Celular"
                        maxlength=15>
                </div>

                <div class="cep">
                    <input type="text" class="cep" name="cep" id="cep" placeholder="CEP" maxlength="9">
                </div>
                <div class="rua">
                    <input type="text" name="rua" id="rua" placeholder="RUA/AVENIDA" readonly>
                </div>
                <div class="numero">
                    <input type="text" name="numerocasa" id="numerocasa" placeholder="Numero">
                </div>
                <div class="cidade">
                    <input type="text" name="cidade" id="cidade" placeholder="CIDADE*" readonly>
                </div>

                <div class="estado">
                    <input type="text" name="estado" id="estado" placeholder="ESTADO" readonly>
                </div>

                <div class="email">
                    <input type="email" name="email" id="email" placeholder="E-mail">
                </div>
                <div class="senha">
                    <input type="password" name="senha" id="senha" placeholder="Senha">
                    <i class="bi bi-eye-fill" id="btnsenha" onclick="mostrarSenha()"></i>
                </div>
                <div class="confirmarsenha">
                    <input type="password" name="confirmasenha" id="confirmasenha" placeholder="Confirmar Senha">
                    <i class="bi bi-eye-fill" id="btnconfirmarsenha" onclick="mostrarConfirmarSenha()"></i>
                </div>
                <div class="form-group" id="opcoesTecnico" style="display: none;">
                    <h2>Opções para Técnicos</h2>
                    <label for="experiencia">Experiência Profissional:</label>
                    <textarea class="form-control" id="perfilExperiencia" name="perfilExperiencia" rows="3"></textarea>

            
                </div>
                <div class="entrar">
                    <p>Ja possui cadastro? <a href="/admin/admin/login.php">Entre agora.</a></p>
                    <br>
                    <input type="submit" value="Cadastrar">
                </div><br>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.onload = function () {
            formatarCampo();
        };

    </script>
    <script>
        var campoCEP = document.getElementById('cep');
        campoCEP.addEventListener('input', function (event) {
            var valor = event.target.value;
            var valorSemLetras = valor.replace(/\D/g, '');
            event.target.value = valorSemLetras;
        });
    </script>
    <script>
    document.getElementById('tecnicoCheckbox').addEventListener('change', function () {
        var opcoesTecnico = document.getElementById('opcoesTecnico');
        opcoesTecnico.style.display = this.checked ? 'block' : 'none';
    });
</script>

</body>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>

</html>