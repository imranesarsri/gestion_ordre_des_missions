$(document).ready(function () {
    // Store the select element in a variable
    const selectedOption = $('.select-moyens-de-transport');

    // Show the relevant form groups when the selection changes
    $(selectedOption).change(function () {
        const optionValue = selectedOption.val();

        switch (optionValue) {
            case 'voiture-de-mission':
                $('.transport-marque, .transport-numéro-de-plaque').show();
                $('.transport-puissance-fiscale').hide();
                break;

            case 'voiture-de-personnel':
                $('.transport-marque, .transport-numéro-de-plaque, .transport-puissance-fiscale').show();
                break;

            case 'transport-public':
                $('.transport-marque, .transport-numéro-de-plaque, .transport-puissance-fiscale').hide();
                break;
        }
    });
});


// Imprimer

document.getElementById("printButton").addEventListener("click", function () {
    window.print();
});
