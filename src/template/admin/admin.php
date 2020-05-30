<?php
session_start();
$_SESSION['url'] = "listeJoueur.php";
if (empty($_SESSION['admin'])) {
    header('Location: ../../../index.php');
}
if (isset($_POST['deconnexion'])) {
    unset($_SESSION['admin']);
    header('Location: ../../../index.php');
}
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'listeQuestion':
            $_SESSION['url'] = "listeQuestion.php";
            break;
        case 'newAdmin':
            $_SESSION['url'] = "newAdmin.php";
            break;
        case 'listeJoueur':
            $_SESSION['url'] = "listeJoueur.php";
            break;
        case 'newQuestion':
        $_SESSION['url'] = "newQuestion.php";
        break;
        case 'modifier_question':
            $_SESSION['url'] = "modifierQuestion.php";
            break;
    }
}
if (isset($_GET['liste'])) {
    include '../../controller/fonction.php';
}
include '../../controller/joueurController.php';
include '../../controller/adminController.php';
$_SESSION['joueurs'] = getJoueur();
$files = '../../../assets/json/question.json';
$db = file_get_contents($files);
$db = json_decode($db, true);
$_SESSION['question'] =$db;
//print_r( $_SESSION['question']);
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <title>admin </title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="../../../assets/css/miniProjet.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="container justify-content-center mt-md-4 bg-primary ">
            <div class="row">
                <div class="col-3">
                    <img src="../../../assets/Images/bg-01.jpg" class="rounded-circle " alt="" width="90" height="90">
                </div>
                <div class="col-6 text-center ">
                    <span class="h2 text-white text-uppercase Righteous"> BIENVENUE <?=$_SESSION['admin']['prenom']?> <?=$_SESSION['admin']['nom']?> CRÉER ET PARAMÉTRER VOS QUIZZ </span>
                </div>
                <div class=" mt-4 col-md-3 text-center ">
                    <form action="" method="POST">
                        <input class="btn  mauve texte-white fr" type="submit" name="deconnexion" value="Déconnexion">

                    </form>
                </div>
            </div>
        </div>
        <div class="container justify-content-center mt-md-4 bg-primary ">
            <div class="row">

                <div class="col-2 mt-ms-4  ml-5 mr-5 mb-4 pb-3 pt-2  text-white text-center h5 mauve">Liste Joueurs </div>

                <div class="col-2 mt-ms-4  ml-5 mr-5 mb-4 pb-3 pt-2  text-white text-center h5 mauve">Créer Admin</div>

                <div class="col-2 mt-ms-4  ml-5 mr-5 mb-4 pb-3 pt-2  text-white text-center h5 mauve">Liste Questions</div>
                <div class="col-2 mt-ms-4  ml-5  mb-4 pb-3 pt-2  text-white text-center h5 mauve">Crée Question </div>


                <div class="container bleu">
                    <div class="row ">
                        <div class="card col-10 bg-primary border-primary">
                            <table class="table table-bordered table-hover text-center mt-2 ">
                                <thead class="bleu">
                                    <tr>
                                        <th scope="col-3">Prénom</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Sore</th>
                                        <th scope="col">image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="mauve">
                                        <td>Mark</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr class="mauve">
                                        <td>Jacob</td>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr class="mauve">
                                        <td>Larry</td>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                    <tr class="mauve">
                                        <td>Larry</td>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                    <tr class="mauve mb-4">
                                        <td class="mb-4">Larry</td>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                    <tr>
                                        <tr class="mauve">
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                            <td>@twitter</td>
                                        </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="card col-2 bg-primary border-primary ">
                            <div class="row justify-content-center pt-4 mb-5 mt-4 ">
                                <input class="button mt-4  roundButton" type="submit" value=">">

                            </div>
                            <div class="row justify-content-center pt-4 mt-5">
                                <button class="button mt-4 roundButton" type="button"><</button>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <script src=" ../../../assets/js/fonction.js "></script>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js " integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js "></script>
            <script src="../../../assets/bower_components/jquery-validation/dist/jquery.validate.min.js "></script>
            <script src="../../../assets/js/fonction.js "></script>
    </body>

    </html>