// Script to package absences

// Include Select2 library
document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>');
document.write('<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />');

// Initialize Select2 for elements with class 'personnel' when the document is ready
$(document).ready(function() {
    $('.personnel').select2();
});
