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
        <!---------  library for icon     -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="container justify-content-center mt-md-2 bg-primary ">
            <!-- header-->
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
        <!-- header-->

        <!-- global content-->
        <div class="container justify-content-center mt-md-2 bg-primary ">
            <!-- navbar-->
            <div class="row">
                <button type="button" id="listeJ" class=" btn btn-lg ml-5  mr-5 mt-2 text-white text-center h5 mauve" >Liste Joueurs </button>
                <button type="button" id="newAdmin"  class="btn btn-lg ml-5 mt-2  mr-2 text-white text-center h5 mauve">Créer Admin</button>
                <button type="button" id="listeQ"  class="btn btn-lg ml-5 mt-2  mr-4 text-white text-center h5 mauve">Liste Questions</button>
                <button type="button" id="newQuestion"  class="btn btn-lg ml-5 mt-2 text-white text-center h5 mauve">Crée Question </button>
            </div>
            <!-- navbar-->

            <!--  content -->
            <div class="container bleu">
                    <div id="container" class="row">

                    </div>
                </div>
            </div>
        <!--  content -->


        <!-- Footer -->
        <footer class="page-footer container mt-2 mb-1">
            <div class="row noir">
                <div class="col-4 ">
                    <img src="../../../assets/Images/footer.PNG" class="rounded-circle " alt="" width="70" height="70">
                </div>
                <div class="footer-copyright text-center py-3 h3 text-white">© 2020 Copyright: amdy diop</div>
            </div>
            <!--a href="https://mdbootstrap.com/"> MDBootstrap.com</a-->
        </footer>
        <!-- Footer -->
            <script src=" ../../../assets/js/fonction.js "></script>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js " integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js "></script>
            <script src="../../../assets/bower_components/jquery-validation/dist/jquery.validate.min.js "></script>
            <script src="../../../assets/js/fonction.js "></script>
        <script>
            $(document).ready(function(){
                $("#listeJ").css("background-color", "#34BBE6");
                $("#container").load("listeJoueur.php ");
                    // un élément portant l'id "content" existe dans contenu.html
                $("#listeJ").click(function () {
                    $("#container").load("listeJoueur.php "); // un élément portant l'id "content" existe dans contenu.html
                    $("#listeJ").css("background-color", "#34BBE6");
                    $("#newAdmin").css("background-color", "#D96BCE");
                    $("#listeQ").css("background-color", "#D96BCE");
                    $("#newQuestion").css("background-color", "#D96BCE");

                });
                $("#listeQ").click(function () {
                    $("#container").load("listeQuestion.php "); // un élément portant l'id "content" existe dans contenu.html
                    $("#listeJ").css("background-color", "#D96BCE");
                    $("#newAdmin").css("background-color", "#D96BCE");
                    $("#listeQ").css("background-color", "#34BBE6");
                    $("#newQuestion").css("background-color", "#D96BCE");
                });
                $("#newAdmin").click(function () {
                    $("#container").load("newAdmin.php "); // un élément portant l'id "content" existe dans contenu.html
                    $("#listeJ").css("background-color", "#D96BCE");
                    $("#newAdmin").css("background-color", "#34BBE6");
                    $("#listeQ").css("background-color", "#D96BCE");
                    $("#newQuestion").css("background-color", "#D96BCE");

                });
                $("#newQuestion").click(function () {
                    $("#container").load("newQuestion.php "); // un élément portant l'id "content" existe dans contenu.html
                    $("#listeJ").css("background-color", "#D96BCE");
                    $("#newAdmin").css("background-color", "#D96BCE");
                    $("#listeQ").css("background-color", "#D96BCE");
                    $("#newQuestion").css("background-color", "#34BBE6");

                });

            });
        </script>
    </body>

    </html>
