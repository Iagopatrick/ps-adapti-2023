let darkModeToggle = document.getElementById("botao-darkmode");
let main = document.getElementById("main-id");
let containerCard = document.getElementById("container-cards-id");
let navbar = document.getElementById("navbar");
let body = document.body;

darkModeToggle.addEventListener("click", () => {
    main.classList.toggle("darkmode");

    containerCard.classList.toggle("darkmode");
    navbar.classList.toggle("darkmode");
    body.classList.toggle("darkmode");
});
