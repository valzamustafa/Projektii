document.addEventListener('DOMContentLoaded', function () {
    const slides = document.querySelectorAll('.slide');
    const prevButton = document.querySelector('.prev'); 
    const nextButton = document.querySelector('.next'); 
    let currentIndex = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        showSlide(currentIndex);
    }

    
    nextButton.addEventListener('click', nextSlide);
    prevButton.addEventListener('click', prevSlide);

    
    setInterval(nextSlide, 5000);
});
function showSidebar() {
    const sidebar = document.querySelector('.slidebar');
    sidebar.style.display = 'flex'; 
    }
    
    function hideSideBar() {
    const sidebar = document.querySelector('.slidebar');
    sidebar.style.display = 'none'; 
    }