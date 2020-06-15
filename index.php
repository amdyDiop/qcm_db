<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Login </title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="assets/css/miniProjet.css">
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
<div class="container d-flex justify-content-center mt-4">
    <div class="row-4 mt-4 col-md-4 bg-white mb-3">
        <div id="resultat" class="alert alert-success text-center" role="alert">
            <!-- Nous allons afficher un retour en jQuery au visiteur -->
        </div>
        <h1 class="text-center mt-xl-4 mb-4 pt-4 login">Login</h1>
        <form action="" method="post" name="connexion">
            <div class="form-group">
                <label for="login">Login</label>
                <input class="col-12 form-control-lg placeholder bgLogin" type="text" name="login" id="login"
                       value="<?= @$_POST['login']?>" placeholder="login">
                <span id="login-error" class="error" for="label"><?= @$error?></span>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input class="col-12 form-control-lg placeholder bgPassword" type="password" name="password"
                       id="password" value="<?= @$_POST['password']?>" placeholder="mot de passe ">
                <span id="password-error" class="error" id="errorP" for="label"><?= @$errorP?></span>
            </div>
            <div class="form-group">
                <input class="col-9 ml-5 button Righteous" id="submit" type="submit" name="submit" value="Connexion ">
            </div>
        </form>
        <div class="form-group ">
            <a href="src/template/joueur/inscription.php">
                <button class="col-9 ml-5 mb-4 button Righteous">S'incrire</button>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js " integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="assets/bower_components/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="assets/js/fonction.js"></script>

</body>

</html>
