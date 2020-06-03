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
    <div class=" mt-3 ml-5 mr-5 bg-primary ">
        <!-- numero page courant -->
        <div class=" container ">
            <div class="row d-flex justify-content-center ">
                <div class=" col-md-1  rounded-circle bleuf mr-4 ml-2 mb-4" alt="" width="60" height="60">
                    <div class="h2 justify-content-center text-center"> 1</div>
                    <!--img src="../../../assets/Images/bg-01.jpg" class="rounded-circle " alt="" width="60" height="60"-->
                </div>
                <div class=" col-md-1  rounded-circle bleuf mr-4 ml-2 mb-4" alt="" width="60" height="60">
                    <div class="h2 justify-content-center text-center"> 2</div>
                    <!--img src="../../../assets/Images/bg-01.jpg" class="rounded-circle " alt="" width="60" height="60"-->
                </div>
                <div class=" col-md-1  rounded-circle bleuf mr-4 ml-2 mb-4" alt="" width="60" height="60">
                    <div class="h2 justify-content-center text-center"> 3</div>
                    <!--img src="../../../assets/Images/bg-01.jpg" class="rounded-circle " alt="" width="60" height="60"-->
                </div>
                <div class=" col-md-1  rounded-circle bg-white mr-4 ml-2 mb-4" alt="" width="60" height="60">
                    <div class="h2 justify-content-center text-center"> 4</div>
                    <!--img src="../../../assets/Images/bg-01.jpg" class="rounded-circle " alt="" width="60" height="60"-->
                </div>

            </div>
        </div>
        <!-- fin page courant -->
    </div>
    <div class="row ">
        <!-- tableaux top joueur -->
        <div class="card col-4 ml-4 mr-22 overflow-auto bg-primary border-primary">
            <table class="table mauve ">
                <thead class="mauve ">
                <tr>
                    <th class="border-right mr-4 ">Top10</th>
                    <th>Score</th>
                </tr>
                </thead>
                <tbody>
                <tr class="mauve ">
                    <td>amdy diop</td>
                    <td>1212 pts</td>
                </tr>
                <tr class="mauve ">
                    <td>amdy diop</td>
                    <td>1212 pts</td>
                </tr>
                <tr class="mauve ">
                    <td>amdy diop</td>
                    <td>1212 pts</td>
                </tr>
                <tr class="mauve ">
                    <td>amdy diop</td>
                    <td>1212 pts</td>
                </tr>
                <tr class="mauve ">
                    <td>amdy diop</td>
                    <td>1212 pts</td>
                </tr>
                <tr class="mauve ">
                    <td>amdy diop</td>
                    <td>1212 pts</td>
                </tr>

                </tbody>
            </table>
        </div>
        <!-- fin  tableaux top joueur -->

        <!-- affichage des question -->
        <div class="card col-6 ml-4 bg-primary border-primary mt-5">
            <div class="container mauve">
                <div class="text-center text-white h3">la question ici mou gaaaw book?</div>
            </div>

            <div class="row mt-2 ml-4 mr-4  p-3 ">
                <form>
                    <div class="row">
                        <div class="custom-checkbox mt-3 col-1">
                            <input class="control-input mr-2 " type="checkbox" id="chexkbox">
                        </div>
                        <div class="h3 text-white mauve p-2"> reponse bi ngay am foofou baaay</div>
                    </div>
                    <div class="row">
                        <div class="custom-checkbox mt-3 col-1 ml-4">
                            <textarea class="h3 text-white mauve p-2 ml-5 " type="text" id="chexkbox"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="custom-checkbox mt-3 col-1">
                            <input class="control-input mr-4 " type="radio" id="chexkbox">
                        </div>
                        <div class="h3 text-white mauve p-2"> reponse bi ngay am foofou baaay</div>
                    </div>
                </form>
                <div class="row  pt-4 mr-5 ml-5 float-left mb-3">
                    <a class="button  mr-5  roundButtonJoueur " href="" type="button"><span class="h1"> < </span></a>
                </div>
                <div class="row  mb-3 pt-4 ml-5 float-right ">
                    <a class="button  ml-5  roundButtonJoueur " href="" type="button"><span class="h1"> > </span></a>

                </div>
            </div>
        </div>
        <!-- fin affichage des question -->
    </div>
</div>
<!-- fin content page page -->

<!-- Footer -->
<footer class="page-footer container mt-2 mb-1">
    <div class="row noir">
    <div class="col-4 ">
        <img src="../../../assets/Images/footer.PNG" class="rounded-circle " alt="" width="70" height="70">
    </div>
    <div class="footer-copyright text-center py-3 h3 text-white">© 2020 Copyright: amdy diop </div>
    </div>
    <!--a href="https://mdbootstrap.com/"> MDBootstrap.com</a-->
</footer>
<!-- Footer -->

</html>
