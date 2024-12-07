function validateForm(event) {
    event.preventDefault(); 


    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;


    if (email === "" || password === "") {
        alert("Të gjitha fushat janë të detyrueshme!");
        return;
    }


    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        alert("Ju lutem, futni një email të vlefshëm.");
        return;
    }

    alert("Login i suksesshëm!");

}