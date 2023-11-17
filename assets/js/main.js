//função de um botao de mostrar senha
function mostrarSenha() {
    var inputPass = document.getElementById('senha');
    var btnShowPass = document.getElementById('btnsenha');

    if (inputPass.type === 'password') {
        inputPass.setAttribute('type', 'text');
        btnShowPass.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
    } else {
        inputPass.setAttribute('type', 'password');
        btnShowPass.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
    }
}

function mostrarConfirmarSenha() {
    var inputConfirmarSenha = document.getElementById('confirmasenha');
    var btnShowConfirmarSenha = document.getElementById('btnconfirmarsenha');

    if (inputConfirmarSenha.type === 'password') {
        inputConfirmarSenha.setAttribute('type', 'text');
        btnShowConfirmarSenha.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
    } else {
        inputConfirmarSenha.setAttribute('type', 'password');
        btnShowConfirmarSenha.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
    }
}

//formata a digitação do cpf, telefone e cep
function formatarCampo() {
    var campos = document.querySelectorAll('input.cpf, input.telefone, input#cep');

    campos.forEach(function (campo) {
        campo.addEventListener('input', function (e) {
            var valor = e.target.value.replace(/\D/g, '');

            if (e.target.classList.contains('cpf')) {
                // Formatação para CPF
                if (valor.length >= 3) {
                    valor = valor.replace(/^(\d{3})(\d)/, '$1.$2');
                }
                if (valor.length >= 6) {
                    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
                }
                if (valor.length >= 9) {
                    valor = valor.replace(/(\d{3})(\d)/, '$1-$2');
                }
            } else if (e.target.classList.contains('telefone')) {
                // Formatação para número de telefone
                valor = valor.replace(/^(\d{2})(\d)/, '($1) $2');
                if (valor.length > 12) {
                    valor = valor.replace(/(\d{5})(\d)/, '$1-$2');
                }
            } else if (e.target.id === 'cep') {
                // Formatação para CEP
                valor = valor.replace(/^(\d{5})(\d)/, '$1-$2');

                // Se o campo do CEP estiver vazio, limpa os campos de endereço
                if (valor.length === 0) {
                    document.getElementById("rua").value = "";
                    document.getElementById("cidade").value = "";
                    document.getElementById("estado").value = "";
                    return; // Retorna para interromper a execução
                }
            }

            e.target.value = valor;
        });
    });
}

document.addEventListener("DOMContentLoaded", function () {
    const cepInput = document.getElementById("cep");

    cepInput.addEventListener("input", function () {
        const cepValue = cepInput.value.replace(/\D/g, '');

        if (cepValue.length !== 8) {
            return;
        }

        const url = `https://viacep.com.br/ws/${cepValue}/json/`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro ao buscar o CEP');
                }
                return response.json();
            })
            .then(data => {
                document.getElementById("rua").value = data.logradouro;
                document.getElementById("cidade").value = data.localidade;
                document.getElementById("estado").value = data.uf;
            })
            .catch(error => {
                console.error('Ocorreu um erro:', error);
            });
    });

    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        const nome = document.getElementById("nome").value;
        const email = document.getElementById("email").value;
        const cpf = document.getElementById("cpf").value;
        const fone = document.getElementById("perfil").value;
        const senha = document.getElementById("senha").value;
        const confirmarSenha = document.getElementById("confirmasenha").value;

        if (nome === "" || email === "" || cpf === "" || senha === "" || confirmarSenha === "") {
            event.preventDefault(); // impede o envio do cadastro se os campos estiverem vazios
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, preencha todos os campos obrigatórios.',
            });
        }
    });

    const urlParams = new URLSearchParams(window.location.search);
    const cadastroSucesso = urlParams.get('cadastro');

    if (cadastroSucesso === 'true') {
        Swal.fire({
            icon: 'success',
            title: 'Cadastro Realizado',
            text: 'Cadastro realizado com sucesso!',
        });
    }

    formatarCampo();
});


