<div id="content" class="container-sm">
    <div class="container mauve">
        <form method="post" name="reponses">
            <?php
            $teste = 0;
            $scoreM=0;
            $scoreS=0;
            $scoreT=0;
            $indiceTrouver =[];
            echo '<div class="card-body ">';
            for ($i = 0; $i <count($_SESSION['tabReponses']) ; $i++) {
                echo '<div class="container ">';
                echo '<div class="row col-md-12 text-white h2-responsive justify-content-md-center">';
                echo $i + 1 . ' . ' . $_SESSION['tabReponses'][$i]['question'];
                echo '</div>';
                //pour compter le nombre de reponse true et checked
                $teste = 0;
                // echo count($_SESSION['tabReponses'][$i]['reponses']);
                for ($j = 0; $j < count($_SESSION['tabReponses'][$i]['reponses']); $j++) {
                    if ($_SESSION['tabReponses'][$i]['reponses'][$j]['etat'] == 1) {
                        $teste++;
                    }

                    //verification type reponse multiple choix

                    if ($_SESSION['tabReponses'][$i]['type'] == "multiple") {
                        //  echo $_SESSION['tabReponses'][$i]['reponses'][$j]['etat'] .'   vs   '.$_SESSION['tabReponses'][$i]['clicked'][$j] ;
                        if ($_SESSION['tabReponses'][$i]['reponses'][$j]['etat'] == 1 && (isset($_SESSION['tabReponses'][$i]['clicked'][$j]) && $_SESSION['tabReponses'][$i]['clicked'][$j] === 1)) {
                            echo '<img class="valide" src="../../../assets/Images/Icones/valide.png" alt="" >';
                            echo ' <input class="radio" type="checkbox" checked disabled="disabled" style="width: 12px; height: 23px" > ' . $_SESSION['tabReponses'][$i]['reponses'][$j]['reponse'] . '<br>';
                            //pour compter le nombre de reponse true et checked
                            $teste--;
                        } elseif ($_SESSION['tabReponses'][$i]['reponses'][$j]['etat'] == 0 && (isset($_SESSION['tabReponses'][$i]['clicked'][$j]) && $_SESSION['tabReponses'][$i]['clicked'][$j] === 1)) {
                            echo '<img class="valide" src="../../../assets/Images/Icones/invalide.png" alt="">';
                            echo ' <input class="radio " type="checkbox" checked disabled="disabled" > ' . $_SESSION['tabReponses'][$i]['reponses'][$j]['reponse'] . '<br>';
                        } elseif ($_SESSION['tabReponses'][$i]['reponses'][$j]['etat'] == 1) {
                            echo '<img class="valide" src="../../../assets/Images/Icones/valide.png" alt="">';
                            echo ' <input class="radio" type="checkbox"  disabled="disabled" > ' . $_SESSION['tabReponses'][$i]['reponses'][$j]['reponse'] . '<br>';
                        } else
                            echo '<input class="checkbox" type="checkbox" disabled="disabled" > ' . $_SESSION['tabReponses'][$i]['reponses'][$j]['reponse'] . '<br>';
                    }


                    //vérification réponse de type radio
                    if ($_SESSION['tabReponses'][$i]['type'] == "simple") {
                        //echo $_SESSION['tabReponses'][$i]['reponses'][$j]['etat'] .'   vs   '.@$_SESSION['tabReponses'][$i]['clicked'];
                        if (($_SESSION['tabReponses'][$i]['reponses'][$j]['etat'] == 1 && @$_SESSION['tabReponses'][$i]['clicked'] === $j)) {
                            echo '<img class="valide" src="../../../assets/Images/Icones/valide.png" alt="">';
                            echo ' <input class="radio" type="radio" disabled="disabled" name="radio" checked > ' . @$_SESSION['tabReponses'][$i]['reponses'][$j]['reponse'] . '<br>';
                            $scoreS +=$_SESSION['tabReponses'][$i]['point'];
                            $indiceTrouver[]= $i;
                            if ($_SESSION['addScore']==1){
                                inserInUserQuestion($_SESSION['questions'][$i]['id'],$_SESSION['user']['id']);
                            }
                        } else if ($_SESSION['tabReponses'][$i]['clicked'] == $j) {
                            echo '<img class="valide" src="../../../assets/Images/Icones/invalide.png" alt="">';
                            echo ' <input class="radio" type="radio" disabled="disabled" name="radio" checked> ' . @$_SESSION['tabReponses'][$i]['reponses'][$j]['reponse'] . '<br>';
                        } elseif ($_SESSION['tabReponses'][$i]['reponses'][$j]['etat'] == 1) {
                            echo '<img class="valide" src="../../../assets/Images/Icones/valide.png" alt="">';
                            echo ' <input class="radio" type="radio" disabled="disabled" name="radio" > ' . @$_SESSION['tabReponses'][$i]['reponses'][$j]['reponse'] . '<br>';
                        } else
                            echo '<input class="inputCheckbox" type="radio" disabled="disabled" name="radio"> ' . @$_SESSION['tabReponses'][$i]['reponses'][$j]['reponse'] . '<br>';
                    }


                    if ($j == count($_SESSION['tabReponses'][$i]['reponses']) - 1 && $teste == 0){
                        $scoreM+= $_SESSION['tabReponses'][$i]['point'];
                        $indiceTrouver[]= $i;
                        if ($_SESSION['addScore']==1){
                            inserInUserQuestion($_SESSION['questions'][$i]['id'],$_SESSION['user']['id']);
                        }
                    }
                }


                if ($_SESSION['tabReponses'][$i]['type'] == "texte") {
                    if ($_SESSION['tabReponses'][$i]['reponses'][0]['reponse'] === @$_SESSION['tabReponses'][$i]['clicked'][0]) {
                        echo '<img class="valide" src="../../../assets/Images/Icones/valide.png" alt="">';
                        echo '<input class="inputReponse" type="text" value="' . $_SESSION['tabReponses'][$i]['reponses'][0]['reponse'] . '" readonly><br>';
                        $scoreT +=$_SESSION['tabReponses'][$i]['point'];
                        $indiceTrouver[]= $i;
                        if ($_SESSION['addScore']==1){
                            inserInUserQuestion($_SESSION['questions'][$i]['id'],$_SESSION['user']['id']);
                        }

                    } else {
                        echo '<img class="valide" src="../../../assets/Images/Icones/valide.png" alt="">';
                        echo '<input class="inputReponse" type="text" value="' . $_SESSION['tabReponses'][$i]['reponses'][0]['reponse'] . '" readonly><br>';
                        echo '<img class="valide" src="../../../assets/Images/Icones/invalide.png" alt="">';
                        echo '<input class="inputReponse" type="text" value="' . @$_SESSION['tabReponses'][$i]['clicked'][0] . '" readonly><br>';
                    }
                }


                echo '</div>';
            }
            echo '</div>';

            echo '<input class="suivant" type="submit" name="reJouer" value="rejouer ">';


            //pour éliminer l'execution de cette code lors du chargement
            if($_SESSION['addScore']  ==1){
                $_SESSION['addScore'] ++;

                $_SESSION['score']= $scoreS + $scoreM + $scoreT;
           //ajoute de la score du joueur au niveau de la base de donnée
             insertScore($_SESSION['user']['id'],$_SESSION['score']);
               // if($_SESSION['user']->score<$_SESSION['score']){
                    //$_SESSION['user']->score=$_SESSION['score'];
                //}
            }
            echo '<div class="resultat">votre score est :'. $_SESSION['score'].'   </div>';
            ?>
        </form>
    </div>
</div>
<script src="../../../assets/js/joueur.js"></script>

<?php
// pour ajouter le score une fois meme en rechargent la page

?>
