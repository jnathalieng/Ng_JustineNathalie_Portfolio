export function contact() {

  // I’m selecting the form and feedback section
  const form = document.querySelector(".contact-form");
  const feedback = document.querySelector("#feedback");

  function submitForm(event) {
    event.preventDefault(); // I stop the page from reloading

    feedback.innerHTML = "";

    const formData = new URLSearchParams({
      name: form.elements.name.value,
      email: form.elements.email.value,
      message: form.elements.message.value
    });

    fetch("CMS/adduser.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded"
      },
      body: formData
    })
    .then(function(response) {
      return response.json();
    })
    .then(function(data) {

      // I check if there are errors
      if (data.errors) {
        data.errors.forEach(function(error) {
          const p = document.createElement("p");
          p.textContent = error;
          feedback.appendChild(p);
        });
        return;
      }

      // If no errors, I reset the form and show success
      form.reset();

      const success = document.createElement("p");
      success.textContent = data.message;
      feedback.appendChild(success);

    })
    .catch(function() {
      const p = document.createElement("p");
      p.textContent = "Something went wrong. Please try again.";
      feedback.appendChild(p);
    });
  }

  if (form) {
    form.addEventListener("submit", submitForm);
  }

}