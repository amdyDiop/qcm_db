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
