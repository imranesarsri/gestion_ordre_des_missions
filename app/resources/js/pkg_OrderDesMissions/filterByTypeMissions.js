
import "https://code.jquery.com/jquery-3.6.0.min.js";

$(document).ready(function () {
    $("#filterSelectByTypeMissions").change(function () {
        var neededUrl = window.location.pathname;
        var mission = $(this).val();
        $.ajax({
            url: neededUrl + "/filter-by-type-mission",
            method: "GET",
            data: { mission: mission },
            success: function (data) {
                console.log(data);
                var newData = $(data);

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
                console.error("Error:", xhr.responseText);
            },
        });
    });

});
