document.querySelector(".change-password-form button").addEventListener("click", function(event) {
    event.preventDefault();  

    const currentPassword = document.getElementById("current-password").value;
    const newPassword = document.getElementById("new-password").value;
    const confirmPassword = document.getElementById("confirm-password").value;

  
    if (newPassword !== confirmPassword) {
        document.getElementById("message").textContent = "Passwords do not match!";
        document.getElementById("message").style.color = "red";
    }
  
    else if (newPassword.length < 8) {
        document.getElementById("message").textContent = "Password must be at least 8 characters long.";
        document.getElementById("message").style.color = "red";
    }
    else {
        document.getElementById("message").textContent = "Password successfully changed!";
        document.getElementById("message").style.color = "green";
    }
});