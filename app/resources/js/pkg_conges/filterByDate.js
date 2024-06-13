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
    // Fonction pour récupérer les données avec AJAX
    // function filterByDate(page, startDate, endDate) {
    //     var neededUrl = window.location.pathname;
    //     console.log(neededUrl);
    //     $.ajax({
    //         url: neededUrl + "?page=" + page + "&startDate=" + startDate + "&endDate=" + endDate,
    //         success: function (data) {
    //             var newData = $(data);

    //             console.log(newData.find("tbody").html())

    //             $("tbody").html('');
    //             $("tbody").html(newData.find("tbody").html());
    //                 $("#card-footer").html(newData.find("#card-footer").html());
    //                 var paginationHtml = newData.find(".pagination").html();
    //                 if (paginationHtml) {
    //                     $(".pagination").html(paginationHtml);
    //                 } else {
    //                     $(".pagination").html("");
    //                 }
    //         },
    //     });
    //     if (page !== null && startDate !== null && endDate !== null) {
    //         updateURLParameter("page", page);
    //         updateURLParameter("startDate", startDate);
    //         updateURLParameter("endDate", endDate);
    //     } else {
    //         window.history.replaceState(
    //             {},
    //             document.title,
    //             window.location.pathname
    //         );
    //     }
    // }

    function filterByDate(page, startDate, endDate) {
        $.ajax({
            url: '/conges?page=' + page + '&startDate=' + startDate + '&endDate=' + endDate,
            success: function (data) {
                var newData = $(data);
                console.log(newData.find("tbody").html());
                $("tbody").html(newData.find("tbody").html());
                $("#card-footer").html(newData.find("#card-footer").html());
                var paginationHtml = newData.find(".pagination").html();
                if (paginationHtml) {
                    $(".pagination").html(paginationHtml);
                } else {
                    $(".pagination").html("");
                }
            },
            error: function (xhr) {
                console.log('Error: ' + xhr.status + ' ' + xhr.statusText);
            }
        });
        if (page !== null && startDate !== null && endDate !== null) {
            updateURLParameter("page", page);
            updateURLParameter("startDate", startDate);
            updateURLParameter("endDate", endDate);
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
    $("body").on("click", "#filter_button", function () {
        var page = 1;
        var startDate = $("#startDate").val();
        var endDate = $("#endDate").val();

        console.log(endDate);
        console.log(startDate);
        filterByDate(page, startDate, endDate);
    });
});
