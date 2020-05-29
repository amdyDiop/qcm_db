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