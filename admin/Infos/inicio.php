<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";

$usuarioController = new UsuarioController();

if (!$usuarioController->usuarioLogado()) {
    header("Location: /admin/admin/login.php");
    exit();
}

$perfilUsuario = $usuarioController->getInformacoesPerfil();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Login</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" class="form-control" value="<?php echo $perfilUsuario['nome']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="text" id="email" class="form-control" value="<?php echo $perfilUsuario['email']; ?>" readonly>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" class="form-control" value="<?php echo $perfilUsuario['cpf']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="fone">Telefone:</label>
                <input type="text" id="fone" class="form-control" value="<?php echo $perfilUsuario['fone']; ?>" readonly>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
