import "./scss/main.scss";

let app = {
    init() {
        let navbarToggle = document.getElementById("navbar-toggle");
        navbarToggle.addEventListener("click", app.handleNavbarToggle);
    },

    handleNavbarToggle() {
        let navbarElement = document.getElementById("navbar");
        navbarElement.classList.toggle("visible");
    }
};

document.addEventListener("DOMContentLoaded", app.init);
