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
    <title>jouer</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="../../../assets/css/miniProjet.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
</head>
<body>
    <div class="container justify-content-center mt-md-2 bg-primary ">
        <div class="row">
            <div class="col-2">
                <img src="../../../assets/Images/bg-01.jpg" class="rounded-circle " alt="" width="90" height="90">
            </div>
            <div class="col-7 text-center ">
                <div class="h4 text-white text-uppercase Righteous"> BIENVENUE AMDY DIOP  </div>
                <span class="h4 text-white text-uppercase Righteous">JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE  </span>
            </div>
            <div class=" mt-4 col-md-3 text-center ">
                <form action="" method="POST">
                    <input class="btn  mauve texte-white fr" type="submit" name="deconnexion" value="Déconnexion">
                </form>
            </div>
        </div>
    </div>
    <div class=" mt-3 ml-5 mr-5 bg-primary ">
<div class="container bg-white">sdfds</div>
sdfds
      </div>


    <img class="logo" src="../../../assets/Images/user/<?= $_SESSION['user']['image'] ?>" alt="logo quiz">


</body>
</html>
