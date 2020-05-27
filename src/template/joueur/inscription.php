<?php
session_start();
include('../../controller/fonction.php');
include('../../controller/joueurController.php');

$error = "";
$errorFile = "";
if (isset($_POST['prenom'])) {
    if (existeLogin($_POST['login']) == 0) {
        $error = " login existe déja";
    } else {
        $error = "";
        //1. strrchr renvoie l'extension avec le point (« . »).
        //2. substr(chaine,1) ignore le premier caractère de chaine.
        //3. strtolower met l'extension en minuscules.
        $extension = strtolower(substr(strrchr($_FILES['file']['name'], '.'), 1));
        $chemin = "../../../assets/Images/user/{$_POST['login']}.{$extension}";
        $resultat = move_uploaded_file($_FILES['file']['tmp_name'], $chemin);
        $objet = [
            "login" => $_POST['login'],
            "password" => $_POST['password'],
            "role" => 'joueur',
            "nom" => $_POST['nom'],
            "prenom" => $_POST['prenom'],
            "photo" => $chemin,
            "score"=>0,
            "repondue"=>[]
        ];
        $files = '../../../assets/json/user.json';
        $db = file_get_contents($files);
        $db = json_decode($db, true);
        array_push($db, $objet);
        $db = json_encode($db);
        file_put_contents('../../../assets/json/user.json', $db);
        $objet = json_decode(json_encode($objet), FALSE);
        header('Location: ../../../index.php');


    }
}

//creation de fosuser
//fosUser();
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <title>Login </title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../../../assets/css/miniProjet.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

    <body>
        <div class="container d-flex justify-content-center mt-4">
            <div class="row-4 mt-4 mb-3 col-md-5 bg-white ">
                <h1 class="text-center mt-xl-4  pt-1 inscription">Inscription</h1>
                <form action="" method="post">
                    <div class="row">
                        <div class="card col-8 border-white">
                            <div class="row">
                                <div class="container col-10 ml-0">
                                    <div class="form-group">
                                        <div class="row ml-2">
                                            <label for="login focusedInput">Login</label>
                                        </div>
                                        <input class="col-12 form-control placeholder bgLogin" type="text " name="login" id="login" value="" placeholder="login ">
                                    </div>
                                    <div class="form-group ">
                                        <div class="row ml-2 ">
                                            <label for="nom ">Nom</label>
                                        </div>
                                        <input class="col-12 form-control placeholder bgLogin " type="texte " name="nom " id="nom " value=" " placeholder="Votre nom ">
                                    </div>
                                    <div class="form-group ">
                                        <div class="row ml-2 ">
                                            <label for="prenom ">Prénom</label>
                                        </div>
                                        <input class="col-12 form-control placeholder bgLogin " type="texte " name="prenom " id="prenom " value=" " placeholder="Votre prnom ">
                                    </div>
                                    <div class="form-group ">
                                        <div class="row ml-2 ">
                                            <label for="password ">Mot de passe</label>
                                        </div>
                                        <input class="col-12 form-control placeholder bgPassword " type="password " name="password " id="password " value=" " placeholder="mot de passe ">
                                    </div>
                                    <div class="form-group ">
                                        <div class="row ml-2 ">
                                            <label for="password ">Confirmation</label>
                                        </div>
                                        <input class="col-12 form-control placeholder bgPassword " type="password " name="cPassword " id="cPassword " value=" " placeholder=" resaisir le mot de passe ">
                                    </div>

                                    <div class="form-group ">
                                        <input class="col-9 ml-5 button Righteous " type="submit " name="submit " value="S'inscrire ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-4 border-white">
                            <div class="form-group ">
                                <img class="round " alt="Cinque Terre " src="../../../assets/Images/img-bg.jpg " alt=" ">
                                <input class="form-control-file row-2 inputFile Righteous bg-primary-" type="file" name="file " value="file ">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src=" assets/js/fonction.js "></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js " integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>
    </body>

    </html>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>
    </body>

    </html>