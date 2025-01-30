function showSidebar() {
    const sidebar = document.querySelector('.slidebar');
    sidebar.style.display = 'flex'; 
    }

    function hideSideBar() {
    const sidebar = document.querySelector('.slidebar');
    sidebar.style.display = 'none'; 
    }


    function loadPage(page) {
        document.getElementById("mainFrame").src = page;
    }

    document.getElementById("showCarForm").addEventListener("click", function() {
        var container = document.getElementById("carFormContainer");

        if (container.innerHTML.trim() === "") {

            fetch("cars.php?formOnly=true")
                .then(response => response.text())
                .then(data => {
                    container.innerHTML = data;
                    container.style.display = "block";
                })
                .catch(error => console.error("Gabim në ngarkimin e formës:", error));
        } else {

            container.style.display = (container.style.display === "none") ? "block" : "none";
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