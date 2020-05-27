<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Login </title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="assets/css/miniProjet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex justify-content-center mt-4">
        <div class="row-4 mt-4 col-md-4 bg-white mb-3">
            <h1 class="text-center mt-xl-4 mb-5 pt-4 login">Login</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="login focusedInput">Login</label>
                    <input class="col-12 form-control-lg placeholder bgLogin" type="text " name="login" id="login" value="" placeholder="login">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input class="col-12 form-control-lg placeholder bgPassword" type="password" name="password" id="password" value="" placeholder="mot de passe ">
                </div>
                <div class="form-group">
                    <input class="col-9 ml-5 button Righteous" type="submit" name="submit" value="Connexion ">
                </div>
            </form>
            <div class="form-group ">
                <a href="src/template/joueur/inscription.php"> <button class="col-9 ml-5 mb-4 button Righteous">S'incrire</button>
            </div>
        </div>
    </div>
    <script src=" assets/js/fonction.js "></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js " integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>
</body>

</html>