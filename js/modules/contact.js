export function contact() {

  // Contact Form
  const form = document.querySelector(".contact-form");
  const feedBack = document.querySelector("#feedback");

  function clearFeedback() {
    feedBack.innerHTML = "";
  }

  function addError(error) {
    const errorElement = document.createElement("p");
    errorElement.textContent = error;
    feedBack.appendChild(errorElement);
  }

  function showErrors(errors) {
    clearFeedback();
    errors.forEach(addError);
  }

  function showMessage(message) {
    clearFeedback();

    const messageElement = document.createElement("p");
    messageElement.textContent = message;
    feedBack.appendChild(messageElement);
  }

  function handleJSON(response) {
    return response.json();
  }

  function handleResponse(responseText) {
    if (responseText.errors) {
      showErrors(responseText.errors);
      return;
    }

    form.reset();
    showMessage(responseText.message);
  }

  function handleError(error) {
    console.error("Error during fetch", error);
    showMessage("Sorry, something went wrong. Please try again later.");
  }

  function submitContactForm(event) {
    event.preventDefault();

    const thisForm = event.currentTarget;
    const url = "CMS/adduser.php";

    const formData = new URLSearchParams({
      name: thisForm.elements.name.value,
      email: thisForm.elements.email.value,
      message: thisForm.elements.message.value
    });

    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded"
      },
      body: formData
    })
      .then(handleJSON)
      .then(handleResponse)
      .catch(handleError);
  }

  if (form) {
    form.addEventListener("submit", submitContactForm);
  }

}