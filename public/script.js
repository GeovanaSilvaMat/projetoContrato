document.addEventListener('DOMContentLoaded', function () {
    // 1. Obter os dados do elemento script
    const scriptTag = document.getElementById('contrato-script');
    const buscarUrl = scriptTag.dataset.buscarUrl; // Lê 'data-buscar-url'
    let csrfTokenName = scriptTag.dataset.csrfTokenName;
    let csrfTokenValue = scriptTag.dataset.csrfTokenValue;

    // 2. Selecionar os elementos do DOM (sem mudanças aqui)
    const btnBuscar = document.getElementById('btn-buscar-cnpj');
    const inputCnpj = document.getElementById('cnpj');
    const loadingSpan = document.getElementById('loading');
    const messageP = document.getElementById('message');
    const campos = ['razao_social', 'endereco', 'email'];

    // 3. Adicionar o evento de clique (a lógica interna muda um pouco)
    btnBuscar.addEventListener('click', function () {
        const cnpj = inputCnpj.value;
        if (!cnpj) {
            alert('Por favor, digite um CNPJ.');
            return;
        }

        limparCampos();
        messageP.textContent = '';
        loadingSpan.style.display = 'inline';

        const formData = new FormData();
        formData.append('cnpj', cnpj);
        // Usa as variáveis que pegamos do data-*
        formData.append(csrfTokenName, csrfTokenValue); 

        // Usa a URL que pegamos do data-*
        fetch(buscarUrl, {
            method: 'POST',
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            },
            body: formData
        })
        .then(response => {
            // Atualiza o token CSRF para a próxima requisição (importante se o token regenera)
            // No CodeIgniter 4, o cabeçalho 'X-CSRF-TOKEN' pode não ser enviado por padrão em todas as respostas.
            // A maneira mais segura é renovar o token a partir do corpo da resposta se você o enviar de volta
            // ou simplesmente confiar que a sessão o manterá atualizado.
            // Para simplificar, vamos remover a lógica de atualização do token aqui, pois o token na view principal 
            // geralmente é suficiente para várias requisições AJAX na mesma página.

            if (!response.ok) {
                return response.json().then(err => { throw new Error(err.error || 'Erro na busca.'); });
            }
            return response.json();
        })
        .then(data => {
            campos.forEach(campo => {
                if (document.getElementById(campo) && data[campo]) {
                    document.getElementById(campo).value = data[campo];
                }
            });
        })
        .catch(error => {
            messageP.textContent = error.message;
            console.error('Erro:', error);
        })
        .finally(() => {
            loadingSpan.style.display = 'none';
        });
    });

    function limparCampos() {
        campos.forEach(campo => {
            if(document.getElementById(campo)) {
                document.getElementById(campo).value = '';
            }
        });
    }
});