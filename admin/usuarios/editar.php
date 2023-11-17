<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";

$usuarioController = new UsuarioController();

$usuario = $usuarioController->editarUsuario();
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

<main class="container mt-3 mb-3">
    <h1>Editar Usuarios</h1>

    <form action="editar.php?id_usuario=<?= $usuario->id_usuario ?>" method="post" class="row g-3">
        <div class="col-md-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required value="<?= $usuario->nome ?>">
        </div>
        <div class="col-md-6">
            <label for="nome" class="form-label">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control">
            <p class="text-secondary">Caso queira manter a senha, deixe o campo em branco!</p>
        </div>
        <div class="col-md-6">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" required value="<?= $usuario->cpf ?>"
                maxlength="14">
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control" required value="<?= $usuario->email ?>">
        </div>
        <div class="col-md-6">
            <label for="nome" class="form-label">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control" required
                value="<?= $usuario->telefone ?>" maxlength="15">
        </div>
        <div class="col-md-6">
            <label for="nome" class="form-label">Perfil</label>
            <select name="perfil" class="form-select" id="perfil" required>
                <option disabled>Selecione o Perfil</option>
                <option value="usuario" <?= ($usuario->perfil == "usuario") ? "selected" : "" ?>>Usuário</option>
                <option value="empresa" <?= ($usuario->perfil == "empresa") ? "selected" : "" ?>>Empresa</option>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="/admin/admin/admnistrativo.php" class="btn btn-danger">Cancelar</a>

        </div>
    </form>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>