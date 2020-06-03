<?php
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>admin </title>
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
<div class="container justify-content-center mt-md-4 bg-primary ">
    <div class="row">
        <div class="col-3">
            <img src="../../../assets/Images/bg-01.jpg" class="rounded-circle " alt="" width="90" height="90">
        </div>
        <div class="col-6 text-center ">
            <span class="h2 text-white text-uppercase Righteous"> BIENVENUE <?= @$_SESSION['admin']['prenom'] ?> <?= @$_SESSION['admin']['nom'] ?> CRÉER ET PARAMÉTRER VOS QUIZZ </span>
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
        <!-- nav bar admin-->
        <div class="col-2 mt-ms-4  ml-5 mr-5 mb-4 pb-3 pt-2  text-white text-center h5 mauve">Liste Joueurs</div>
        <div class="col-2 mt-ms-4  ml-5 mr-5 mb-4 pb-3 pt-2  text-white text-center h5 mauve">Créer Admin</div>
        <div class="col-2 mt-ms-4  ml-5 mr-5 mb-4 pb-3 pt-2  text-white text-center h5 mauve">Liste Questions</div>
        <div class="col-2 mt-ms-4  ml-5  mb-4 pb-3 pt-2  text-white text-center h5 mauve">Crée Question</div>
        <!-- nav bar admin-->

        <!-- content  admin-->
        <div class="container bleu">
            <div class=" justify-content-center">
                <div class="row-4 mt-2 mb-3 col-md-12 bg-white ">
                    <div class="alert-success" id="resultat"></div>
                    <h1 class="text-center mt-xl-2  pt-1 inscription">Inscription</h1>
                    <form action="" method="post" enctype="multipart/form-data" name="inscription">
                        <div class="row">
                            <div class="card col-8 border-white">
                                <div class="row">
                                    <div class="col">
                                        <div class="row ml-2">
                                            <label for="login">Login</label>
                                        </div>
                                        <input class="col-12 form-control-lg placeholder bgLogin mb-2" type="text"
                                               name="login"
                                               id="login" value="<?= @$_POST['login'] ?>"
                                               placeholder="nom d'utilisateur ">
                                        <span id="login-error" class="error" for="label"></span>
                                    </div>
                                    <div class="col">
                                        <div class="row ml-2 ">
                                            <label for="prenom">Prénom</label>
                                        </div>
                                        <input class="col-12 form-control-lg placeholder bgLogin mb-2" type="text"
                                               name="prenom"
                                               id="prenom" value="<?= @$_POST['prenom'] ?>" placeholder="Votre Prénom ">
                                        <span id="prenom-error" class="error" for="label"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="row ml-2">
                                            <label for="login">Nom</label>
                                        </div>
                                        <input class="col-12 form-control-lg placeholder bgLogin mb-2" type="text"
                                               name="nom"
                                               id="nom" value="<?= @$_POST['nom'] ?>"
                                               placeholder=" Votre nom ">
                                        <span id="nom-error" class="error" for="label"></span>
                                    </div>
                                    <div class="col">
                                        <div class="row ml-2 ">
                                            <label for="password">Mot de passe</label>
                                        </div>
                                        <input class="col-12 form-control-lg placeholder bgPassword mb-2"
                                               type="password"
                                               name="password" id="password" value="<?= @$_POST['password'] ?>"
                                               placeholder="mot de passe ">
                                        <span id="password-error" class="error" for="label"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="row ml-2 ">
                                            <label for="cPassword">Confirmation</label>
                                        </div>
                                        <input class="col-12 form-control-lg placeholder bgPassword mb-22"
                                               type="password"
                                               name="cPassword" id="cPassword" value="<?= @$_POST['cPassword'] ?>"
                                               placeholder=" resaisir le mot de passe ">
                                        <span id="cPassword-error" class="error" for="label"></span>

                                    </div>
                                    <div class="col">
                                        <div class="form-group ">
                                            <input class="col-12 ml-5 button Righteous mt-4" id="submitIns"
                                                   type="submit" name="submit"
                                                   value="S'inscrire ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="card col-4 border-white">
                            <div class="form-group ">
                                <img class="roundj" src="../../../assets/Images/user.png" alt="avarar">
                                <input class="form-control-file inputFile bg-primary-" type="file" name="file" id="file"
                                       value="<?= @$_POST['file'] ?>" onchange="previewFile()">
                                <div id="file-error" class="error" for="label"></div>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- nav bar admin-->
    </div>
</div>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js "
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN "
        crossorigin="anonymous "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js "
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q "
        crossorigin="anonymous "></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js "
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl "
        crossorigin="anonymous "></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js "></script>
<script src="../../../assets/bower_components/jquery-validation/dist/jquery.validate.min.js "></script>
<script src="../../../assets/js/fonction.js "></script>
</body>

</html>
