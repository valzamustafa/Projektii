document.getElementById("login-form").addEventListener("submit", function (event) {
    event.preventDefault();

    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();
    const errorMessageElement = document.getElementById("error-message");
    errorMessageElement.textContent = "";

    if (email === "" || password === "") {
        errorMessageElement.textContent = "Please fill in all fields.";
        return;
    }

    const formData = new FormData();
    formData.append("email", email);
    formData.append("password", password);

    fetch("LogIn.php", {
        method: "POST",
        body: formData,
    })
    .then((response) => response.text())
    .then((data) => {
        if (data === "user" || data === "admin") {
            alert("You have been successfully logged in!");
            window.location.href = data === "user" ? "home.html" : "dashboard.html";
        } else if (data === "invalid_credentials") {
            errorMessageElement.textContent = "Invalid email or password.";
        } else if (data === "empty_fields") {
            errorMessageElement.textContent = "Please fill in all fields.";
        } else {
            errorMessageElement.textContent = "Unexpected error. Please try again.";
        }
    })
    .catch((error) => {
        console.error("Error:", error);
        errorMessageElement.textContent = "An error occurred. Please try again.";
    });
});
