<html lang="fr">
<head>
    <title>Inscription administrateur</title>
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
    <script src="../../../assets/js/fonction.js "></script>
</head>
<body>
<div class="container d-flex justify-content-center">
    <div class="row-4 mt-2 mb-3 col-md-5 bg-white ">
        <div class="alert-success" id="resultat"></div>
        <h1 class="text-center mt-xl-2  pt-1 inscription">Inscription</h1>
        <form action="" method="post" enctype="multipart/form-data" name="inscription">
            <div class="row">
                <div class="card col-10 border-white">
                    <div class="row">
                        <div class="container col-10 ml-0">
                            <div class="form-group">
                                <div class="row ml-2">
                                    <label for="login">Login</label>
                                </div>
                                <input class="col-12 form-control placeholder bgLogin" type="text" name="login"
                                       id="login" value="<?= @$_POST['login']?>" placeholder="nom d'utilisateur ">
                                <span id="login-error" class="error" for="label"></span>
                            </div>
                            <div class="form-group ">
                                <div class="row ml-2 ">
                                    <label for="nom">Nom</label>
                                </div>
                                <input class="col-12 form-control placeholder bgLogin " type="text" name="nom" id="nom"
                                       value="<?=@$_POST['nom']?>" placeholder="Votre nom ">
                                <span id="nom-error" class="error" for="label"></span>
                            </div>
                            <div class="form-group ">
                                <div class="row ml-2 ">
                                    <label for="prenom">Prénom</label>
                                </div>
                                <input class="col-12 form-control placeholder bgLogin " type="text" name="prenom"
                                       id="prenom" value="<?=@$_POST['prenom']?>" placeholder="Votre Prénom ">
                                <span id="prenom-error" class="error" for="label"></span>
                            </div>
                            <div class="form-group ">
                                <div class="row ml-2 ">
                                    <label for="password">Mot de passe</label>
                                </div>
                                <input class="col-12 form-control placeholder bgPassword " type="password"
                                       name="password" id="password" value="<?= @$_POST['password']?>"
                                       placeholder="mot de passe ">
                                <span id="password-error" class="error" for="label"></span>

                            </div>
                            <div class="form-group ">
                                <div class="row ml-2 ">
                                    <label for="cPassword">Confirmation</label>
                                </div>
                                <input class="col-12 form-control placeholder bgPassword" type="password"
                                       name="cPassword" id="cPassword" value="<?=@$_POST['cPassword']?>"
                                       placeholder=" resaisir le mot de passe ">
                                <span id="cPassword-error" class="error" for="label"></span>
                            </div>
                            <div class="form-group ">
                                <input class="col-9 ml-5 button Righteous" id="submitIns" type="submit" name="submit"
                                       value="S'inscrire ">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-2 border-white">
                    <div class="form-group ">
                        <img class="round" src="../../../assets/Images/user.png" alt="avarar">
                        <input class="form-control-file  bg-primary-" type="file" name="file" id="file"
                             onchange="previewFile()">
                        <input type="hidden" value="joueur" id="role">
                        <div id="file-error" class="error" for="label"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
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
<script src="../../../assets/js/inscription.js"></script>


</body>

</html>
