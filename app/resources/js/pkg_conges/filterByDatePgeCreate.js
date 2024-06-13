import "https://code.jquery.com/jquery-3.6.0.min.js";

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

    function filterByDate(page, personnel_id) {
        $.ajax({
            url:
                "/conges/create?page=" + page + "&personnel_id=" + personnel_id,
            success: function (data) {
                var newData = $(data);
                // console.log(newData.find("tbody").html());
                var tbodyLastYear = newData.find('#CongesLastYear').html();
                var tbodyFirstYear = newData.find('#CongesFirstYear').html();
                console.log(tbodyLastYear);
                console.log(tbodyFirstYear);
                // console.log(newData.find('#CongesLastYear'));
                $("#CongesLastYear").html(newData.find('#CongesLastYear').html());
                $("#CongesFirstYear").html(newData.find('#CongesFirstYear').html());


                // $("tbody").html(newData.find("tbody").html());
                // $("#card-footer").html(newData.find("#card-footer").html());
                var paginationHtml = newData.find(".pagination").html();
                if (paginationHtml) {
                    $(".pagination").html(paginationHtml);
                } else {
                    $(".pagination").html("");
                }
            },
            error: function (xhr) {
                console.log("Error: " + xhr.status + " " + xhr.statusText);
            },
        });
        if (page !== null && personnel_id !== null) {
            updateURLParameter("page", page);
            updateURLParameter("personnel_id", personnel_id);
        } else {
            window.history.replaceState(
                {},
                document.title,
                window.location.pathname
            );
        }
    }

    console.log(557);
    // Event listener for filter button
    $("body").on("change", "#personnel_id", function () {
        var page = 1;
        var personnel_id = $("#personnel_id").val();

        console.log(personnel_id);
        filterByDate(page, personnel_id);
    });
});

// let personnel_id = document.getElementById("personnel_id");
// personnel_id.addEventListener("change", function () {
//     const newPersonnelId = personnel_id.value;

//     // Get the current URL search parameters
//     const urlParams = new URLSearchParams(window.location.search);

//     // Set the new personnel_id parameter value
//     urlParams.set("personnel_id", newPersonnelId);

//     // Reflect the changes in the URL without reloading
//     history.replaceState(null, "", "?" + urlParams.toString());
// });
