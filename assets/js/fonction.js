// Wait for the DOM to be ready
$(document).ready(function() {
    // Initialisez la validation du formulaire sur le formulaire de connexion.
    $("form[name='connexion']").validate({
        // Specify validation rules
        rules: {
            // le nom a gauche est le name de l'inpute
            login: "required",
            password: {
                required: true,
                minlength: 5 //longueur mininum d'un password
            }
        },
        // message d'erreur pour chaque validation
        messages: {
            login: " Veuillez saisir votre  nom d'utilisateur ! ",
            password: {
                required: "Veuillez saisir votre mot de passe !",
                minlength: "Votre mot de passe doit contenir au moins 5 caractères"
            },
        },
        // Assure que le formulaire est soumis à la destination définie
        submitHandler: function(form) {
            form.submit();
        }
    });
});





$(document).ready(function() {
    // Initialisez la validation du formulaire sur le formulaire de inscription.
    $("form[name='inscription']").validate({
        // Specify validation rules
        rules: {
            // les nom de l'attribut a gauche
            prenom: "required",
            nom: "required",
            file: {
                required: true,
               //accept: "(jpg|png)"
                //
                },

            login: {
                required: true,
                minlength: 5
            },
            password: {
                required: true,
                minlength: 5
            },
            cPassword:{
                required: true,
                equalTo : "#password"

            }

        },
        // Specify validation error messages
        messages: {
            prenom: "Saisir votre  prenom ! ",
            nom: "Saisir votre enom !",
            password: {
                required: "Saisir votre mot de passe",
                minlength: "Votre mot de passe doit contenir au moins 5 caractères"

            },
            cPassword: {
                required: "Confirmer votre mot de passe ",
                equalTo: "Mot de passe non identique "

            },
            login: {
                required: "Veuillez saisir votre  nom d'utilisateur",
                minlength: "Votre mot de passe doit contenir au moins 5 caractères"
            },
            file: {
                required:" choisir un image!",
                accept: "seul les images en png et jpg sont autorisé"
            },

        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });
});
