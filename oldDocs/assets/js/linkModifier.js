document.addEventListener("DOMContentLoaded", function () {
    let currentURL = window.location.href;

    // Check if the current URL ends with "prototype/"
    if (currentURL.endsWith("prototype/")) {
        // If it does, hide the link
        let presentationLink = document.getElementById("presentation-icon");
        presentationLink.style.opacity = "0";
    } else {
        // If it doesn't, append "/presentation.html" to the URL and set it as the link's href
        let presentationURL = currentURL + "presentation.html";
        let presentationLink = document.getElementById("presentation-icon");
        presentationLink.setAttribute("href", presentationURL);
    }
});
