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
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>admin </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge"
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="../../../assets/css/miniProjet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/materialD/css/mdb.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!---------  library for icon     -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <!-- header-->
    <div class="row">
        <div class="col-3">
            <img src="../../../assets/Images/user/<?= $_SESSION['admin']['image'] ?>" class="rounded-circle " alt=""
                 width="90" height="90">
        </div>
        <div class="col-6 text-center ">
            <span class="h2 text-white text-uppercase Righteous"> BIENVENUE <?= $_SESSION['admin']['prenom'] ?> <?= $_SESSION['admin']['nom'] ?> CRÉER ET PARAMÉTRER VOS QUIZZ </span>
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
    <div class="row" id="navbar">
        <button type="button" id="listeJ" class=" btn btn-lg col text-white text-center h5 mauve">Liste Joueurs</button>
        <button type="button" id="newAdmin" class="btn btn-lg col text-white text-center h5 mauve">Créer Admin</button>
        <button type="button" id="listeQ" class="btn btn-lg col  text-white text-center h5 mauve">Liste Questions
        </button>
        <button type="button" id="newQuestion" class="btn btn-lg col  text-white text-center h5 mauve">Crée Question
        </button>
        <button type="button" id="listeAdmin" class="btn btn-lg col text-white text-center h5 mauve">Liste Admin
        </button>
    </div>
    <!-- navbar-->

    <!--  content -->
    <div class="container bleu ">
        <!--------------------chargement de page jquery---------------------->
        <div id="container"  class="row ">
      <?php include ('../../template/admin/listeJoueur.php')?>
            <!--you content--->
        </div>
    </div>
</div>
<!--  content -->
<!-- Footer -->
<footer class="page-footer container mt-2 mb-1">
    <div class="row noir">
        <div class="col-2">
            <img src="../../../assets/Images/footer.PNG" class="rounded-circle " alt="" width="70" height="70">
        </div>
        <span class="footer-copyright text-center py-3 h3 text-white col-8">© 2020 Copyright: amdy diop</span>
    </div>
    <!--a href="https://mdbootstrap.com/"> MDBootstrap.com</a-->
</footer>
<!-- Footer -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js "
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN "
        crossorigin="anonymous "></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js "
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl "
        crossorigin="anonymous "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js "
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q "
        crossorigin="anonymous "></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js "></script>
<script src="../../../assets/bower_components/jquery-validation/dist/jquery.validate.min.js "></script>
<script src="../../../assets/js/fonction.js "></script>
</body>

</html>
