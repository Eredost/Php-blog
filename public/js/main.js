!function(){"use strict";let e={init(){document.getElementById("navbar-toggle").addEventListener("click",e.handleNavbarToggle);let t=document.getElementsByClassName("alert__closer");for(let n of t)n.addEventListener("click",e.handleAlertClose)},handleNavbarToggle(){document.getElementById("navbar").classList.toggle("visible")},handleAlertClose(e){let t=e.currentTarget.parentNode;t.classList.add("hidden"),setTimeout((function(){t.remove()}),300)}};document.addEventListener("DOMContentLoaded",e.init)}();