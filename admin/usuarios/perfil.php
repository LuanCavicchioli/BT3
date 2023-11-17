<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
?>

<main>
    <div class="container mt-5">
        <h1 class="text-center">Perfil do Usuário</h1>

        <form>
            <div class="col-md-6">
                <div class="foto-container" id="foto-container">
                    <img src="caminho/para/a/foto.jpg" alt="Foto do Usuário" class="foto" id="foto">
                    <input type="file" class="form-control" id="fotoInput" name="foto" style="display: none;">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="Seu Nome" readonly>
                </div>

                <div class="col-md-6">
                    <label for="cpf" class="form-label">CPF:</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" maxlength="14" value="*********" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="telefone" class="form-label">Telefone/Celular:</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone/Celular" value="(12) 3456-7890" readonly>
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="seu@******" readonly>
                </div>
                <div class="container mt-1">
                        <a href="alterar_dados.php" class="btn btn-primary">Alterar Dados</a>
                    </div>
            </div>

            <div class="row mb-3">
                <!-- Adicione mais campos conforme necessário -->
            </div>

        </form>
    </div>

    <script>
        document.getElementById('fotoInput').addEventListener('change', function() {
            var foto = document.getElementById('foto');
            var fotoInput = this;

            var reader = new FileReader();

            reader.onload = function(e) {
                foto.src = e.target.result;
            };

            reader.readAsDataURL(fotoInput.files[0]);
        });

        document.getElementById('foto-container').addEventListener('click', function() {
            var fotoInput = document.getElementById('fotoInput');
            fotoInput.click();
        });
    </script>
</main>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>