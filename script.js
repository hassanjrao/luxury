const menuButton = document.getElementById("menuButton");
const menu = document.getElementById('menu')
const dropdown = document.getElementById("dropdown");

let menuOpen = false;

menuButton.addEventListener("click", () => {
    console.log('asd')
    dropdown.classList.toggle("hidden");
    menuOpen = !menuOpen;
});


dropdown.addEventListener("click", () => {
    console.log('clicked')
    dropdown.classList.toggle("hidden");
    menuOpen = !menuOpen;
});

dropdown.addEventListener('blur', function () {
    console.log('asd')
    dropdown.classList.add('hidden')
});

document.addEventListener('click', function (event) {
    // Check if the click target is outside the menu and the button
    if (menuOpen && !menu.contains(event.target) && !menuButton.contains(event.target)) {
        menuOpen = false;
        dropdown.classList.add('hidden');
    }
});

const navbar = document.querySelector("nav");

window.addEventListener("scroll", () => {
    if (window.scrollY > 0) {
        // When the page is scrolled down, change the navbar background color to black
        navbar.classList.add("bg-black");
        navbar.classList.add("text-white");
        document.getElementById("animatedTitle").classList.remove("hidden");
    } else {
        // When the page is at the top, remove the background color
        navbar.classList.remove("bg-black");
        navbar.classList.remove("text-white");
        document.getElementById("animatedTitle").classList.add("hidden");
    }
});

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth' // This makes the scroll smooth
    });
}


function scrollToElement(elementId, offset = 20) {
    const element = document.getElementById(elementId);
    if (element) {
        const elementPosition = element.getBoundingClientRect().top + window.pageYOffset;
        const offsetPosition = elementPosition - offset;
        element.scrollIntoView({
            behavior: 'smooth', // Smooth scroll effect
            top: offsetPosition,
        });
    } else {
        console.error(`Element with ID '${elementId}' not found.`);
    }
}