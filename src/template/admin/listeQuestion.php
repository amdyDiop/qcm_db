<?php
session_start();
$_SESSION['url'] = "topScore.php";
$filenbQuestion = '../../../assets/json/nombreDeQuestionParJeux.json';
$_SESSION['nbQuestionsParJeux'] = file_get_contents($filenbQuestion);
//$_SESSION['question'] =$db;
if (empty($_SESSION['user']))
    header('Location: ../../../index.php');
if (isset($_POST['deconnexion'])) {
    unset($_SESSION['user']);
    header('Location: ../../../index.php');
}
include('../../controller/joueurController.php');
if (isset($_GET['page'])) {
    if ($_GET['page'] == "topScore") {
        $_SESSION['url'] = "topScore.php";
    } elseif ($_GET['page'] == "meilleur") {
        $_SESSION['url'] = "meilleur.php";
    }
}
//declaration question par page pour le jeux
$_SESSION['questionParPage'] = 1;
// traitement lors de la click sur le bouton suivant
if (isset($_POST['suivant'])) {
    traitementQuestion();
    if ($_SESSION['pageCourant'] * $_SESSION['questionParPage'] < count($_SESSION['tabReponses']))
        $_SESSION['pageCourant']++;
}
// traitement lors de la click sur le bouton précédent
if (isset($_POST['precedent'])) {
    traitementQuestion();
    if ($_SESSION['pageCourant'] > 1)
        $_SESSION['pageCourant']--;
}
if (isset($_POST['terminer'])) {
    traitementQuestion();
    $_SESSION['jeux'] = "resultat.php";
}
// traitement lors de la click sur le bouton suivant
if (isset($_POST['reJouer'])) {
    include('../../controller/nouvellePartieController.php');
}
//echo count($_POST['modifier']);
//echo $_SESSION['nbQuestions'];
//$_SESSION['debutQuestion'] = ($_SESSION['pageCourant'] - 1) * $_SESSION['questionParPage'];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>liste des question  </title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="../../../assets/css/miniProjet.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <!---------  library for icon     -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!-- header page -->
<div class="container justify-content-center mt-md-2 bg-primary ">
    <div class="row">
        <div class="col-2">
            <img src="../../../assets/Images/bg-01.jpg" class="rounded-circle " alt="" width="90" height="90">
        </div>
        <div class="col-7 text-center ">
            <div class="h4 text-white text-uppercase Righteous"> BIENVENUE AMDY DIOP</div>
            <span class="h4 text-white text-uppercase Righteous">JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE  </span>
        </div>
        <div class=" mt-4 col-md-3 text-center ">
            <form action="" method="POST">
                <input class="btn  mauve texte-white fr" type="submit" name="deconnexion" value="Déconnexion">
            </form>
        </div>
    </div>
</div>
<!-- fin  header page -->
<!-- content page -->
<div class="card mt-3 container bg-primary bg-border">
    <div class="row ">
        <!-- tableaux top joueur -->
        <div class="card col-12 ml-2 mr-2 bleu" style="background-color: #34BBE6">
            <table class="table mauve ">
                <thead class="mauve ">
                <tr class="border-right  border-primary">
                    <th class="border-right mr-4 border-primary bleuf">Question</th>
                    <th class="border-right mr-4 border-primary bleuf">Points</th>
                    <th class="border-right mr-4 border-primary bleuf">Type</th>
                    <th class="border-right mr-4 border-primary bleuf">Réponses</th>
                    <th class="border-right mr-4 border-primary bleuf">Réponses vrais</th>
                    <th class="border-right mr-4 border-primary bleuf">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr class="mauve ">
                    <td class="border-right mr-4 border-primary">Question ici amoule seral mean niaf ko fi </td>
                    <td class="border-right mr-4 border-primary">1212 pts</td>
                    <td class="border-right mr-4 border-primary">simple </td>
                    <td class="border-right mr-4 border-primary">5 reponses</td>
                    <td class="border-right mr-4 border-primary">Question ici amoule seral mean niaf ko fi </td>
                    <td class="border-right mr-4 border-primary">actio</td>
                </tr>
                <tr class="mauve ">
                    <td class="border-right mr-4 border-primary">Question ici amoule seral mean niaf ko fi </td>
                    <td class="border-right mr-4 border-primary">1212 pts</td>
                    <td class="border-right mr-4 border-primary">simple </td>
                    <td class="border-right mr-4 border-primary">
                        <div> 1 reponses</div> <div> 2 reponses</div> <div> 3reponses</div>
                    </td>
                    <td class="border-right mr-4 border-primary">
                        <div> 5 reponses</div> <div> 5 reponses</div>
                    </td>
                    <td class="border-right mr-4 border-primary">
                        <button class="btn mauve"> <i class=" fa fa-pencil" style="color: white"></i> </button>
                        <button class="btn mauve"><i class="fa fa-eye " style="color: white"></i></button>
                        <button class="btn mauve"><i class="fa fa-trash" style="color: white"></i> </button>

                    </td>
                </tr>

                </tbody>
            </table>
        </div>
        <!-- fin  tableaux top joueur -->

    </div>
</div>
<!-- fin content page page -->

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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js "
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN "
        crossorigin="anonymous "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js "
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q "
        crossorigin="anonymous "></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js "
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl "
        crossorigin="anonymous "></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../../../assets/bower_components/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="../../../assets/js/fonction.js"></script>
</body>
</html>
