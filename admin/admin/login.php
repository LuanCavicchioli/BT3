<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";



$usuarioController = new UsuarioController();

$usuarioController->loginUsuario();

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/cadastro.css">
    <title>BuscaTec - Login</title>
</head>

<body id="principal">

    <div id="login">

        <div class="caixa">

            <img src="/assets/img/a.png" alt="">
            <h1>Login</h1>
            <form action="login.php" method="post">

            <div class="email">
                <input type="email" name="email" id="email" placeholder="E-mail">
            </div>

            <div class="senha">
                <input type="password" name="senha" id="senha" placeholder="Senha">
            </div>

            <div class="entrar">
                <p>Ainda não tem uma conta? <a href="/admin/usuarios/cadastrar.php">Crie uma.</a></p>
                <input type="submit" value="Entrar">
            </div>
            </form>

        </div>

    </div>

</body>

</html>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>