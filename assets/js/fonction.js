// validation formulaire login
/*$(document).ready(function () {
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
    });
    });
*/

//login avec ajax
$(document).ready(function () {
    $("#resultat").hide(1);
    $("#submit").click(function (e) {
        e.preventDefault();
        $.post(
            'http://localhost/mini-projetDB/src/controller/indexController.php', // Un script PHP que l'on va créer juste après
            {
                login: $("#login").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                password: $("#password").val()
            },
            function (data) {
                if ($("#login").val() === "") {
                    $("#login-error").html("Veuillez saisir votre  nom d'utilisateur !")
                        .fadeIn().delay(2000).fadeOut();
                } else if ($("#password").val() === "") {
                    $("#password-error").html("Veuillez saisir votre  mot de passe !")
                        .fadeIn().delay(2000).fadeOut();
                } else {
                    if (data === 'joueur') {
                        $("#resultat").show().html("CONNEXION REUSSIE CHARGEMENT ...");
                        setTimeout(function () {
                            window.location.href = "src/template/joueur/joueur.php";
                        }, 2000);
                    } else if (data === 'admin') {
                        $("#resultat").show().html("CONNEXION ...");
                        setTimeout(function () {
                            window.location.href = "src/template/admin/admin.php";
                        }, 2000);
                    } else if (data === 'password not found') {
                        //lors ce que le mot de passe ne correspond pas a celle du login
                        $("#password-error").html("mot de passe incorrecte")
                            .fadeIn().delay(2000).fadeOut();
                    } else if (data === 'not found') {
                        //lors ce quele login ne ce trouve pas dans notre base de donnée
                        $("#login-error").html("Cet utilisateur n'a pas de compte? inscrivez-vous pour se connecter")
                            .fadeIn().delay(2000).fadeOut();
                    }
                }

            },
            'text'
        );
    });
});

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



/**
$("#submitIns").click(function (e) {
    e.preventDefault();

    var file_data = $('#file').prop('files')[0];    //Fetch the file
    var form_data = new FormData();
    form_data.append("file",file_data);
    //Ajax to send file to upload
    $.ajax({
        url:'http://localhost/mini-projetDB/src/controller/inscriptionController.php', // Un script PHP que l'on va créer juste après
        //Server api to receive the file
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
                console.log(data);

            } else if ($("#nom").val() === "") {
                $("#nom-error").html("Veuillez saisir votre  nom  !")
                    .fadeIn().delay(2000).fadeOut();
                console.log(data);

            } else if ($("#prenom").val() === "") {
                $("#prenom-error").html("Veuillez saisir votre  prénom  !")
                    .fadeIn().delay(2000).fadeOut();
                console.log(data);

            } else if ($("#password").val() === "") {
                $("#password-error").html("Veuillez saisir votre  mot de passe  !")
                    .fadeIn().delay(2000).fadeOut();
                console.log(data);
            } else if ($("#cPassword").val() !== $("#password").val()) {
                $("#cPassword-error").html("mot de passe non identique!")
                    .fadeIn().delay(2000).fadeOut();
                console.log(data);

            } else if ($("#file").val() === "") {
                $("#file-error").html("Choisisez une photo!")
                    .fadeIn().delay(2000).fadeOut();
                console.log(data);

            } else if (data === 'login existe') {
                $("#login-error").html("ce login existe")
                    .fadeIn().delay(2000).fadeOut();
                console.log(data);
            } else if (data === "success") {
                $("#resultat").show().html("inscription réussie connectez-vous à votre compte ...");
                setTimeout(function () {
                    // window.location.href = "../../../index.php";
                }, 2000);
                console.log(data);
            }
            else if (data=== "error")
            {
                $("#resultat").html("jaaloule !")
                    .fadeIn().delay(2000).fadeOut();
                console.log(data);

            }
            else {
                $("#resultat").html("file amoule thiote ndeyam !")
                    .fadeIn().delay(2000).fadeOut();
                console.log(data);
            }

        }
    });
});
*/

//inscription et mise a jour de la base de  donnée
/**
$(document).ready(function () {
    $("#resultat").hide(1);
    $("#submitIns").click(function (e) {
            e.preventDefault();
            $.post(
                'http://localhost/mini-projetDB/src/controller/inscriptionController.php', // Un script PHP que l'on va créer juste après
                {
                    login: $("#login").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                    nom: $("#nom").val(),
                    prenom: $("#prenom").val(),
                    password: $("#password").val(),
                    cPassword: $("#cPassword").val(),
                    file: $("#file").prop('files')[0],
                },
                function (data) {
                    if ($("#login").val() === "") {
                        $("#login-error").html("Veuillez saisir votre  nom d'utilisateur !")
                            .fadeIn().delay(2000).fadeOut();
                        console.log(data);

                    } else if ($("#nom").val() === "") {
                        $("#nom-error").html("Veuillez saisir votre  nom  !")
                            .fadeIn().delay(2000).fadeOut();
                        console.log(data);

                    } else if ($("#prenom").val() === "") {
                        $("#prenom-error").html("Veuillez saisir votre  prénom  !")
                            .fadeIn().delay(2000).fadeOut();
                        console.log(data);

                    } else if ($("#password").val() === "") {
                        $("#password-error").html("Veuillez saisir votre  mot de passe  !")
                            .fadeIn().delay(2000).fadeOut();
                        console.log(data);
                    } else if ($("#cPassword").val() !== $("#password").val()) {
                        $("#cPassword-error").html("mot de passe non identique!")
                            .fadeIn().delay(2000).fadeOut();
                        console.log(data);

                    } else if ($("#file").val() === "") {
                        $("#file-error").html("Choisisez une photo!")
                            .fadeIn().delay(2000).fadeOut();
                        console.log(data);

                    } else if (data === 'login existe') {
                        $("#login-error").html("ce login existe")
                            .fadeIn().delay(2000).fadeOut();
                        console.log(data);
                    } else if (data === "success") {
                        $("#resultat").show().html("inscription réussie connectez-vous à votre compte ...");
                        setTimeout(function () {
                            // window.location.href = "../../../index.php";
                        }, 2000);
                        console.log(data);
                    }
                else if (data=== "error")
                    {
                        $("#resultat").html("daaloule !")
                            .fadeIn().delay(2000).fadeOut();
                        console.log(data);

                    }
                else {
                        $("#resultat").html("file amoule thiote ndeyam !")
                            .fadeIn().delay(2000).fadeOut();
                        console.log(data);
                    }

        },
        'text'
    );
});
});
*/
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
// navigation de du nav bar
$(document).ready(function () {
    $("#navbar").click(function (e) {
        // un élément portant l'id "content" existe dans contenu.html
        switch (e.target.id) {
            case "listeJ":
                $("#container").load("listeJoueur.php "); // un élément portant l'id "content" existe dans contenu.html
                $("#listeJ").css("background-color", "#34BBE6");
                $("#newAdmin").css("background-color", "#D96BCE");
                $("#listeQ").css("background-color", "#D96BCE");
                $("#newQuestion").css("background-color", "#D96BCE");
                $("#listeAdmin").css("background-color", "#D96BCE");
                break;
            case "listeQ":
                $("#container").load("listeQuestion.php "); // un élément portant l'id "content" existe dans contenu.html
                $("#listeJ").css("background-color", "#D96BCE");
                $("#newAdmin").css("background-color", "#D96BCE");
                $("#listeQ").css("background-color", "#34BBE6");
                $("#newQuestion").css("background-color", "#D96BCE");
                $("#listeAdmin").css("background-color", "#D96BCE");
                break;
            case "newAdmin":
                $("#container").load("newAdmin.php "); // un élément portant l'id "content" existe dans contenu.html
                $("#listeJ").css("background-color", "#D96BCE");
                $("#newAdmin").css("background-color", "#34BBE6");
                $("#listeQ").css("background-color", "#D96BCE");
                $("#newQuestion").css("background-color", "#D96BCE");
                $("#listeAdmin").css("background-color", "#D96BCE");
                break;
            case "newQuestion":
                $("#container").load("newQuestion.php "); // un élément portant l'id "content" existe dans contenu.html
                $("#listeJ").css("background-color", "#D96BCE");
                $("#newAdmin").css("background-color", "#D96BCE");
                $("#listeQ").css("background-color", "#D96BCE");
                $("#newQuestion").css("background-color", "#34BBE6");
                $("#listeAdmin").css("background-color", "#D96BCE");
                break;
            case "listeAdmin":
                $("#container").load("listeAdmin.php "); // un élément portant l'id "content" existe dans contenu.html
                $("#listeJ").css("background-color", "#D96BCE");
                $("#newAdmin").css("background-color", "#D96BCE");
                $("#listeQ").css("background-color", "#D96BCE");
                $("#newQuestion").css("background-color", "#D96BCE");
                $("#listeAdmin").css("background-color", "#34BBE6");
                break;
            default:
            //$("#listeJ").css("background-color", "#34BBE6");
            //$("#container").load("listeJoueur.php ");
        }
    });
});
