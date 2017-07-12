$(document).ready(function() {

   for (ii = 1; ii < 4; ii++) {
        var div = $('#viewProducts' + [ii]).find('div');
        console.log(div);
        if (div.length <= 0 ) {
            $('#noProduct'+[ii]).html('<h3>Pas de produit disponible pour cette période</h3>');
        }
    }
});

