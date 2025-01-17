function validateForm() {
   
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var message = document.getElementById('message').value;


    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!email.match(emailPattern)) {
        alert("Ju lutem shkruani një email të vlefshëm.");
        return false;
    }


    var phonePattern = /^\+?[0-9]{1,4}?[0-9]{7,10}$/;
    if (!phone.match(phonePattern)) {
        alert("Ju lutem shkruani një numër telefoni të vlefshëm.");
        return false;
    }


    if (name == "" || message == "") {
        alert("Ju lutem plotësoni të gjitha fushat.");
        return false;
    }

    alert("Mesazhi u dërgua me sukses!");
    return true; 
}

 function showSidebar() {
const sidebar = document.querySelector('.slidebar');
sidebar.style.display = 'flex'; 
}

function hideSideBar() {
const sidebar = document.querySelector('.slidebar');
sidebar.style.display = 'none'; 
}
