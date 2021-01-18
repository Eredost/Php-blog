import "./scss/main.scss";

let app = {
    init() {
        let navbarToggle = document.getElementById("navbar-toggle");
        navbarToggle.addEventListener("click", app.handleNavbarToggle);

        let alertClosers = document.getElementsByClassName("alert__closer");
        for (let closer of alertClosers) {
            closer.addEventListener("click", app.handleAlertClose);
        }
    },

    handleNavbarToggle() {
        let navbarElement = document.getElementById("navbar");
        navbarElement.classList.toggle("visible");
    },

    handleAlertClose(event) {
        let divElement = event.currentTarget.parentNode;

        divElement.classList.add('hidden');
        setTimeout(function () {
            divElement.remove();
        }, 300);
    }
};

document.addEventListener("DOMContentLoaded", app.init);
