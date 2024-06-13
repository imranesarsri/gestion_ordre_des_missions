import 'bootstrap';
// Import jQuery
// import 'jquery/dist/jquery';
// Import AdminLTE
import "admin-lte/dist/js/adminlte";
import 'admin-lte/plugins/bootstrap/js/bootstrap.bundle';
import 'admin-lte/dist/js/adminlte';
import './app.recherche';
import './pkg_conges/filterByDate';
import './pkg_conges/filterByDatePgeCreate';
import './pkg_OrderDesMissions/filterByTypeMissions';

// Importation de CKEditor
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

document.addEventListener("DOMContentLoaded", function () {
    // Initialisation de CKEditor
    ClassicEditor.create(document.querySelector("#editor"))
        .then((editor) => {
            window.editor = editor;
        })
        .catch((error) => {
            console.error(
                "There was a problem initializing the editor.",
                error
            );
        });
    ClassicEditor
        .create(document.querySelector('#Remarques'))
        .catch(error => {
            console.error(error);
        });
});

$(document).ready(function () {
    // Fonction pour mettre à jour un paramètre dans l'URL
    function updateURLParameter(param, paramVal) {
        var url = window.location.href;
        var hash = location.hash;
        url = url.replace(hash, "");
        if (url.indexOf(param + "=") >= 0) {
            var prefix = url.substring(0, url.indexOf(param + "="));
            var suffix = url.substring(url.indexOf(param + "="));
            suffix = suffix.substring(suffix.indexOf("=") + 1);
            suffix =
                suffix.indexOf("&") >= 0
                    ? suffix.substring(suffix.indexOf("&"))
                    : "";
            url = prefix + param + "=" + paramVal + suffix;
        } else {
            if (url.indexOf("?") < 0) url += "?" + param + "=" + paramVal;
            else url += "&" + param + "=" + paramVal;
        }
        window.history.replaceState({ path: url }, "", url + hash);
    }

})

// select2
$(document).ready(function () {
    $('.select2').select2();
});

// Attestation
document.getElementById("printButton").addEventListener("click", function () {
    var printContents = document.getElementById("Attestation").innerHTML;
    var originalContents = document.body.innerHTML;

    // Temporarily replace the body's HTML with the printable content
    document.body.innerHTML = printContents;

    // Print the content
    window.print();

    // Restore the original content
    document.body.innerHTML = originalContents;

    // Reload the original scripts to restore the original state of the page
    window.location.reload();
});
