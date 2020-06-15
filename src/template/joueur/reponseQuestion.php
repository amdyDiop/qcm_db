<div id="content" class="container-sm">
    <div class="container mauve">
        <?php
        //var_dump($_SESSION['tabReponses']);
        for ($i = $_SESSION['debutQuestion']; ($i < $_SESSION['questionParPage'] * $_SESSION['pageCourant'] && $i < count($_SESSION['tabReponses'])); $i++) {
            echo '<div class="text-center text-white h3">' . $_SESSION['tabReponses'][$i]['question'] . '</div>';
            echo '</div>';
            echo '<div class="justify-content-center mauve mt-4 py-4  pl-3 pr-3 mx-auto text-white h3-responsive">';
            echo '<span class="textequestion">' . $_SESSION['tabReponses'][$i]['point'] . '</span> pts';
            echo '</div>';
            echo '<div class="row mt-2 ml-4 mr-4  p-3 ">';
            echo '<form method="post">';
            if ($_SESSION['tabReponses'][$i]['type'] == "simple") {
                for ($j = 0; $j < count($_SESSION['tabReponses'][$i]['reponses']); $j++) {
                    echo '<div class="  row mx-auto">';
                    echo '<div class="custom-checkbox mt-3 col-1">';
                    if ($_SESSION['tabReponses'][$i]['clicked'] === $j) {
                        echo '<input class="control-input mr-2 " type="radio" name="radio" value="radio' . $j . '" checked> <br>';
                        echo '</div>';
                        echo '<div class=" reponse  h3 text-white mauve p-2"  style="width: 25rem;height: 2em"> ' . $_SESSION['tabReponses'][$i]['reponses'][$j]['reponse'] . '</div>';
                        echo '</div>';
                    } else {
                        echo '<input class="control-input mr-2 " type="radio" name="radio" value="radio' . $j . '"> <br>';
                        echo '</div>';
                        echo '<div class=" reponse  h3 text-white mauve p-2"  style="width: 25rem;height: 2em"> ' . $_SESSION['tabReponses'][$i]['reponses'][$j]['reponse'] . '</div>';
                        echo '</div>';
                    }

                }
            } elseif ($_SESSION['tabReponses'][$i]['type'] == "multiple") {
                for ($j = 0; $j < count($_SESSION['tabReponses'][$i]['reponses']); $j++) {
                    echo '<div class="row">';
                    echo '<div class="custom-checkbox mt-3 col-1">';

                    if (@$_SESSION['tabReponses'][$i]['clicked'][$j] === 1)
                        echo '<input class="inputCheckbox" type="checkbox" name="checbox' . $j . '"  checked ><br>';
                    else
                        echo '<input class="control-input mr-4" type="checkbox"  name="checbox' . $j . '" > <br>';
                    echo ' </div>';
                    echo '  <div class="h3 text-white mauve " style="width: 25rem;height: 2em">' . $_SESSION['tabReponses'][$i]['reponses'][$j]['reponse'] . ' </div>';
                    echo ' </div>';
                }
            } else {
                echo ' <div class="row">';
                echo '  <textarea class="h3 text-white mauve p-2 ml-5 " type="text" id="chexkbox"  name="texte" style="width: 18rem;"></textarea>';
                echo '  </div>';
            }
            ?>

            <?php
            if ($_SESSION['pageCourant'] == 1 && count($_SESSION['tabReponses']) == 1) {
                echo '<input class="suivant" type="submit" name="terminer" value="Terminer">';
                echo '<input class="quitter" type="submit" name="terminer" value="Quitter">';
            } elseif ($_SESSION['pageCourant'] == 1) {
                echo '<input class="suivant" type="submit" name="suivant" value="Suivant">';
                echo '<input class="quitter" type="submit" name="terminer" value="Quitter">';
            } else if ($_SESSION['pageCourant'] == count($_SESSION['tabReponses'])) {
                echo '<input class="suivant" type="submit" name="terminer" value="Terminer">';
                echo '<input class="precedent " type="submit" name="precedent" value="Précedent">';
            } else {
                echo '<input class="suivant" type="submit" name="suivant" value="Suivant">';
                echo '<input class="precedent " type="submit" name="precedent" value="Précedent">';
                echo '<input class="quitter" type="submit" name="terminer" value="Quitter">';
            }
            echo '</form>';
        } ?>
        <script src="../../../assets/js/joueur.js"></script>




    </div>
</div>
