// validation formulaire d'inscription
$(document).ready(function () {
    // Initialisez la validation du formulaire sur le formulaire de inscription.
    $("form[name='inscription']").validate({
        // Specify validation rules
        rules: {
            // les nom de l'attribut a gauche
            prenom: "required",
            nom: "required",
            file: {
                //  required: true,
                //accept: "(jpg|png)"
                //
            },
            login: {
                required: true,
                minlength: 4
            },
            password: {
                required: true,
                minlength: 5
            },
            cPassword: {
                required: true,
                equalTo: "#password"

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
                required: " choisir un image!",
                accept: "seul les images en png et jpg sont autorisé"
            },
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });
});

$("#submitIns").click(function (e) {
    e.preventDefault();
    var login = $('#login').val();
    var prenom = $('#prenom').val();
    var nom = $('#nom').val();
    var password = $('#password').val();
    var role = $('#role').val();

    var file_data = $('#file').prop('files')[0];    //Fetch the file
    var form_data = new FormData();
    form_data.append("file",file_data);
    form_data.append("login",login);
    form_data.append("prenom",prenom);
    form_data.append("nom",nom);
    form_data.append("password",password);
    form_data.append("role",role);
    //Ajax to send file to upload
    $.ajax({
        url:'http://localhost/mini-projetDB/src/controller/inscriptionController.php', // Un script PHP que l'on va créer juste après
        type: "POST",
        dataType: 'script',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        success:function(data){
            if ($("#login").val() === "") {
                $("#login-error").html("Veuillez saisir votre  nom d'utilisateur !")
                    .fadeIn().delay(2000).fadeOut();
                //console.log(data);

            }
            else if ($("#nom").val() === "") {
                $("#nom-error").html("Veuillez saisir votre  nom  !")
                    .fadeIn().delay(2000).fadeOut();
               // console.log(data);
            }
            else if ($("#prenom").val() === "") {
                $("#prenom-error").html("Veuillez saisir votre  prénom  !")
                    .fadeIn().delay(2000).fadeOut();
              //  console.log(data);
            }
            else if ($("#password").val() === "") {
                $("#password-error").html("Veuillez saisir votre  mot de passe  !")
                    .fadeIn().delay(2000).fadeOut();
               // console.log(data);
            }
            else if ($("#cPassword").val() !== $("#password").val()) {
                $("#cPassword-error").html("mot de passe non identique!")
                    .fadeIn().delay(2000).fadeOut();
              //  console.log(data);
            }
            else if ($("#file").val() === "") {
                $("#file-error").html("Choisisez une photo!")
                    .fadeIn().delay(2000).fadeOut();
              //  console.log(data);

            }
            else if (data === 'login existe') {
                $("#login-error").html("ce login existe déja")
                    .fadeIn().delay(2000).fadeOut();
               // console.log(data);
            } else if (data == 1) {
                $("#resultat").show().html("inscription réussie connectez-vous à votre compte ...")
                    .fadeIn().delay(2000).fadeOut();
                $('#submitIns')[0].reset();
               if (role=="joueur")
                   setTimeout(function () {
                    window.location.href = "../../../index.php";
                }, 2000);
                //console.log(data);
            }
            else if (data == 0)
            {
                $("#resultat").html("erreur lors de upload file  !")
                    .fadeIn().delay(2000).fadeOut();
                console.log(data);
            }
        }
    });
});
//previous image file
function previewFile() {
    const preview = document.querySelector('.round');
    const file = document.querySelector('input[type=file]').files[0];
    const reader = new FileReader();
    reader.addEventListener("load", function () {
        // convert image file to base64 string
        preview.src = reader.result;
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
}
