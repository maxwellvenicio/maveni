document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch(this.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message); // Exibe mensagem de sucesso/erro
        if (data.success) {
            this.reset(); // Limpa o formulário
        }
    })
    .catch(error => {
        alert('Erro na conexão.');
    });
});