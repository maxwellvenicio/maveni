const sendContactData = async (contactData) => {
  console.log("Enviando dados para o backend:", contactData); 

  const response = await fetch("http://localhost:3000/api/contact", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(contactData),
  });

  return response.json();
};
