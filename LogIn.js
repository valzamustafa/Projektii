document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault(); 

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    let errorMessage = "";

    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailRegex.test(email)) {
        errorMessage += "Please enter a valid email address.\n";
    }

    if (password.length < 8) {
        errorMessage += "Password must be at least 8 characters long.\n";
    }

  
    const errorMessageElement = document.getElementById("error-message");
    errorMessageElement.textContent = "";

    if (errorMessage !== "") {
        errorMessageElement.textContent = errorMessage;
        return;
    }

    
    if (!document.getElementById("success-message")) {
        let successMessage = document.createElement("p");
        successMessage.textContent = "You have been successfully logged in!";
        successMessage.id = "success-message";
        successMessage.style.color = "green";
        successMessage.style.fontSize = "18px";
        successMessage.style.textAlign = "center";
        document.querySelector(".login-box").appendChild(successMessage);

       
    }
});
function showSidebar() {
    const sidebar = document.querySelector('.slidebar');
    sidebar.style.display = 'flex'; 
    }
    
    function hideSideBar() {
    const sidebar = document.querySelector('.slidebar');
    sidebar.style.display = 'none'; 
    }