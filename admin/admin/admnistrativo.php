<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Usuario.php";

if(isset($_GET["del"]) && !empty($_GET['id_usuario'])){
    $usuarioController = new UsuarioController();
    $usuarioController->excluirUsuario();
}

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<main class="container mt-3 mb-3">
    <h1>Lista De Usuários</h1>
    <a href="/admin/usuarios/cadastrar.php" class="btn btn-primary float-end">Cadastrar</a>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/alerta.php"; ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Senha</th>
                <th>Fone</th>
                <th>Perfil</th>
                <th style="width: 200px">Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $usuarioController = new UsuarioController();
                $usuarios = $usuarioController->listarUsuarios();
                
                foreach($usuarios as $usuario):
            ?>
            <tr>
                <td><?=$usuario->id_usuario?></td>
                <td><?=$usuario->nome?></td>
                <td><?=$usuario->cpf?></td>
                <td><?=$usuario->email?></td>
                <td><?=$usuario->senha?></td>
                <td><?=$usuario->telefone?></td>
                <td><?=$usuario->perfil?></td>
                <td>
                <a href="/admin/usuarios/editar.php?id_usuario=<?=$usuario->id_usuario?>" class="btn btn-primary">Editar</a>
                   <a href="index.php?id_usuario=<?=$usuario->id_usuario?>&del" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php"; ?>
