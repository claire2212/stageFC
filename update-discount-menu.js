$(document).ready(function() {

    $(function() {
        //récupère le click du bouton
        $(".updateEvent").click(function(e) {
            e.preventDefault();

            //récupère la valeur de data-path pour renvoyer vers la fonction du controller grâce au nom de la route
            var path = ($(this).attr("data-path"));

            //charge la modal en passant la route /updateProduct + id
            $("#modal-wrapper").load(path, {}, function() {
                $("#myUpdateModal").modal("show");

                //parseFloat le prix pour qu'il soit considéré comme un nombre
                var currentPrice = parseFloat($('#currentPriceUpdate').attr("data-price")).toFixed(2);

                //fonction qui gère les modifications devaluers et calcule le nouveau prix
                var changeForm = function(){

                    var buttonRadio = $('input[name="product_update[discountType]"]:checked').val();

                    //récupère tout ce qui est saisi par l'utilisateur dans l'input montant de la remise
                    var discountValue = $('#product_update_discountValue').val() 
                
                    //si l'input vaut 0 donc = à € on calcul le prix en faisant une soustraction
                    if(buttonRadio =='0'){
                        var updateNewPrice = (currentPrice - discountValue).toFixed(2);
                        console.log(updateNewPrice)
                        //condition pour vérifier que le prix ne sera pas inférieur à 0 et désactive le bouton valider
                        if (updateNewPrice <= 0) {
                            $("#errorsUpdateProduct").html("Erreur : la remise ne peut pas être supérieure ou égale au prix");
                            $(':input[type="submit"]').prop('disabled', true);

                        // si pas de valeur, message d'avertissement
                        } else if (discountValue == '' || discountValue.length == "0") {
                            console.log(discountValue)
                            $("#errorsUpdateProduct").html("Erreur : Veuillez saisir un montant de remise");
                            $(':input[type="submit"]').prop('disabled', true);

                        //sinon on affiche le résultat de la soustraction et on permet au client de valider
                    } else {
                            $("#errorsUpdateProduct").html("");
                            $(':input[type="submit"]').prop('disabled', false);
                            $("#newPrice").html("<h3>Nouveau prix : " + updateNewPrice + "€</h3>");
                        }

                    }

                    //si l'input vaut 1 donc = à % on calcul le prix
                    if(buttonRadio =='1'){
                        var updateNewPrice = (currentPrice - (currentPrice * (discountValue / 100))).toFixed(2);
                        
                        //condition pour vérifier que le prix ne sera pas inférieur à 0 et désactive le bouton valider
                        if (updateNewPrice <= 0) {
                            $("#errorsUpdateProduct").html("Erreur : le taux de remise ne peut être supérieur à 100");
                            $(':input[type="submit"]').prop('disabled', true);

                        // si pas de valeur, message d'avertissement
                        } else if (discountValue == '' || discountValue.length == 0) {
                            $("#errorsUpdateProduct").html("Erreur : Veuillez saisir un montant de remise");
                            $(':input[type="submit"]').prop('disabled', true);

                        //sinon on affiche le résultat de la soustraction et on permet au client de valider
                    } else {
                            $("#errorsUpdateProduct").html("");
                            $(':input[type="submit"]').prop('disabled', false);
                            $("#newPrice").html("<h3>Nouveau prix : " + updateNewPrice + "€</h3>");

                        }
                    }
                }
               
               //on appelle la fonction changeForm si le formulaire subi un chgt ou une nouvelle saisie
                var monForm = $('#updateForm');
                monForm.change(changeForm).keyup(changeForm)

                

                //fonction pour notre formulaire
                monForm.submit(function() {

                    //ternaire pour la gestion de la photo
                    //form[0] permet de récupérer l'image
                    var formdata = (window.FormData) ? new FormData(monForm[0]) : null;

                    //soit data devient newFormdata (donc object avec image) soit fonction de serialize
                    var data = (formdata !== null) ? formdata : monForm.serialize();

                    // AJAX
                    $.ajax({
                        method: "POST",
                        url: path,
                        contentType: false, // obligatoire pour de l'upload
                        processData: false, // obligatoire pour de l'upload
                        data: data,
                        dataType: "json",
                        success: function(response) {
                            window.location.reload();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            $("#catchError").html('La taille ou le format de la photo n\'est pas correct.');
                        }
                    });
                });

                // A chaque sélection de fichier

                $('#updateForm').find('input[name="product_update[picture]"]').on('change', function(e) {
                    e.preventDefault();
                    var files = $(this)[0].files;
                    console.log(files);
                    if (files.length > 0) {
                        // On part du principe qu'il n'y qu'un seul fichier
                        // étant donné que l'on a pas renseigné l'attribut "multiple"
                        var file = files[0],
                            $image_preview = $('#image_preview');

                        // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
                        $image_preview.find('.thumbnail').removeClass('hidden');
                        $image_preview.find('img').attr('src', window.URL.createObjectURL(file));
                        $image_preview.find('h4').html(file.name);
                    }
                });

                // Bouton "Annuler" pour vider le champ d'upload
                $('#image_preview').find('button[name="annulateButton"]').on('click', function(e) {
                    e.preventDefault();

                    $('#my_form').find('input[name="product_discount[picture]"]').val('');
                    $('#image_preview').find('.thumbnail').addClass('hidden');
                });
            });
        });
    });
});
