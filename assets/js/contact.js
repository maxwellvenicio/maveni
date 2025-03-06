document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("contact-form");
  const responseMessage = document.getElementById("response-message");

  form.addEventListener("submit", async (event) => {
    event.preventDefault();
  
    const formData = new FormData(form);
    const jsonData = Object.fromEntries(formData.entries());
  
    console.log("Dados sendo enviados:", jsonData); // 🚀 Verifique os dados no console
  
    const result = await sendContactData(jsonData);
  
    if (result.success) {
      responseMessage.innerText = "Mensagem enviada com sucesso!";
      form.reset();
    } else {
      responseMessage.innerText = "Erro ao enviar mensagem. Tente novamente.";
    }
  });
  
});
