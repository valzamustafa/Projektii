document.querySelector(".create-account-form").addEventListener("submit", function(event) {
    event.preventDefault();  

    
    const firstName = document.getElementById("first-name").value;
    const lastName = document.getElementById("last-name").value;
    const email = document.getElementById("email").value;
    const birthdate = document.getElementById("birthdate").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm-password").value;

    let message = "";
    let isValid = true;


    if (firstName === "" || lastName === "") {
        message += "First and Last name are required.<br>";
        isValid = false;
    }


    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailRegex.test(email)) {
        message += "Please enter a valid email address.<br>";
        isValid = false;
    }

    if (password.length < 8) {
        message += "Password must be at least 8 characters long.<br>";
        isValid = false;
    }

    
    if (password !== confirmPassword) {
        message += "Passwords do not match.<br>";
        isValid = false;
    }


    const currentDate = new Date();
    const birthDate = new Date(birthdate);
    const age = currentDate.getFullYear() - birthDate.getFullYear();
    const m = currentDate.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && currentDate.getDate() < birthDate.getDate())) {
        age--;
    }

    if (age < 18) {
        message += "You must be at least 18 years old.<br>";
        isValid = false;
    }

    if (birthDate > currentDate) {
        message += "Birthdate cannot be in the future.<br>";
        isValid = false;
    }

   
    const messageElement = document.getElementById("message");
    
    if (isValid) {
        messageElement.innerHTML = "Account successfully created!";
        messageElement.style.color = "green";  
    } else {
        messageElement.innerHTML = message;  
        messageElement.style.color = "red"; 
    }
});