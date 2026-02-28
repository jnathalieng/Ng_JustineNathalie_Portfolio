export function contact() {

    const form = document.querySelector("#contactForm");
    const feedBack = document.querySelector("#feedback");

    function submitForm(event) {
        event.preventDefault();
        // console.log("form has been called");

        const thisform = event.currentTarget;
        const url = "admin/adduser.php";

        const formData = new URLSearchParams({
            name: thisform.elements.name.value,
            email: thisform.elements.email.value,
            message: thisform.elements.message.value,
        });

        fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: formData
        })
        .then(response => response.json())
        .then(responseText => {
            //console.log(responseText);
            feedBack.innerHTML = "";

            if (responseText.errors) {
                responseText.errors.forEach(error => {
                    const errorElement = document.createElement("p");
                        errorElement.textContent = error;
                        feedBack.appendChild(errorElement);
                })
            } else {
                form.reset();
                const messageElement = document.createElement("p");
                messageElement.textContent = responseText.message;
                feedBack.appendChild(messageElement);
            }
        })
        .catch(error => {
            console.error("Error during fetch", error);
            feedBack.innerHTML = "";
            const errorMessageElement = document.createElement("p");
            errorMessageElement.textContent = "Sorry, something went wrong. Please try again later.";
            feedBack.appendChild(errorMessageElement);
        })
    }


    if (form) {
        form.addEventListener("submit", submitForm);
    }

}