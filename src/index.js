import "./scss/main.scss";

let app = {
    init: function () {
        let navbarToggle = document.getElementById('navbar-toggle');
        navbarToggle.addEventListener('click', app.handleNavbarToggle);
    },

    handleNavbarToggle: function () {
        let navbarElement = document.getElementById('navbar');
        navbarElement.classList.toggle('visible');
    }
}

document.addEventListener('DOMContentLoaded', app.init);
