<?php
include('../../assets/sql/functionSQL.php');

$question = $_POST['question'];
$type = $_POST['type'];
$point = $_POST['point'];
$champ = count($_POST) - 4;
//$checked = $_POST['radio'];
// si le type de reponse et de choix multiple
if ($type == "multiple") {
    if (@$_POST['checkbox']) {
        $nbCheckBox = count($_POST['checkbox']);
        if ($nbCheckBox >= 2) {
            insertData($question, $type, $point); //inssertion des donneée au niveau de la base de donnée
            $id = findIDQuestion($question);      // recupération de id au niveau de la base de donnée
            $j = 0;
            try {
                $teste = 0; //pour testé le nombre de question enregistrer
                $db = connexionDB();
                for ($i = 1; $i <= $champ; $i++) {
                    //  echo $_POST['checkbox'][0] . '<br>';
                    if (@$_POST['checkbox'][$j] == $i && !empty($_POST['reponse' . $i . ''])) {
                        $j++;
                        $sql = "INSERT INTO reponses (reponse,etat,questions_id)  VALUE(:reponse, :etat,:questions_id) ";
                        $data = $db->prepare($sql);
                        $data->execute(array(
                            'reponse' => $_POST['reponse' . $i . ''],
                            'etat' => 1,
                            'questions_id' => $id,
                        ));
                        $data->closeCursor(); // Termine le traitement de la requête
                        $teste++;
                        //  echo 'reponse vrais position ' . $i . '<br>';
                    } else if (empty($_POST['reponse' . $i . ''])) {
                        // echo 'boul ko khhole fils repone ' . $i . ' bi baaxule';
                    } else {
                        $sql = "INSERT INTO reponses (reponse,etat,questions_id)  VALUE(:reponse, :etat,:questions_id) ";
                        $data = $db->prepare($sql);
                        $data->execute(array(
                            'reponse' => $_POST['reponse' . $i . ''],
                            'etat' => 0,
                            'questions_id' => $id,
                        ));
                        $data->closeCursor(); // Termine le traitement de la requête
                        $teste++;
                        //   echo 'reponse faux position ' . $i . '<br>';

                    }
                }
                //s'il a enregistrer plus de 3 question
                if ($teste > 2) {
                    echo 1;
                } //si non
                else echo "3 question";
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        } else echo "au moins deux reponses";
    } else echo "pas de réponse";

}
//si le type de reponse et radio
if ($type == "texte") {
    if (@$_POST['texte']) {
        insertData($question, $type, $point); //inssertion des donneée au niveau de la base de donnée
        $id = findIDQuestion($question);      // recupération de id au niveau de la base de donnée
        try {
            $db = connexionDB();
            $sql = "INSERT INTO reponses (reponse,etat,questions_id)  VALUE(:reponse, :etat,:questions_id) ";
            $data = $db->prepare($sql);
            $data->execute(array(
                'reponse' => $_POST['texte'],
                'etat' => 1,
                'questions_id' => $id,
            ));
            $data->closeCursor(); // Termine le traitement de la requête
            echo 1;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    } else
        echo "ajouter une reponse";
} else if (isset($_POST['radio'])) {
    // vérification si la bonne réponse a èté choisie
    function isNotEmpty($champ)
    {
        $testeRadio = 0;
        for ($i = 1; $i <= $champ; $i++) {
            if (!empty(@$_POST['reponse' . $i . '']) && $champ == $i) {
                $testeRadio = 1;
                break;
            }
        }
        if ($testeRadio == 1)
            return true;
        return false;
    }

//au moins deux reponse
    function deuxReponse($champ)
    {
        $testeRadio = 0;
        for ($i = 1; $i <= $champ; $i++) {
            if (!empty($_POST['reponse' . $i . ''])) {
                $testeRadio++;
            }
        }
        if ($testeRadio >= 2)
            return true;
        return false;
    }

// si auccune reponse n'a été choisie
    $checked = $_POST['radio'];
    if (isNotEmpty($champ) == true) {
        if (deuxReponse($champ) == true) {
            insertData($question, $type, $point); // function mise a jour de la base de donnée
            try {
                $db = connexionDB();
                $id = findIDQuestion($question); // function  recupération de  l'id question
                for ($i = 1; $i <= $champ; $i++) {
                    if (isset($_POST['reponse' . $i . ''])) {
                        if ($i == $checked) {
                            $sql = "INSERT INTO reponses (reponse,etat,questions_id)  VALUE(:reponse,:etat,:questions_id) ";
                            $data = $db->prepare($sql);
                            $data->execute(array(
                                'reponse' => $_POST['reponse' . $i . ''],
                                'etat' => 1,
                                'questions_id' => $id,
                            ));
                            $data->closeCursor(); // Termine le traitement de la requête
                        } else {
                            $sql = "INSERT INTO reponses (reponse,etat,questions_id)  VALUE(:reponse, :etat,:questions_id) ";
                            $data = $db->prepare($sql);
                            $data->execute(array(
                                'reponse' => $_POST['reponse' . $i . ''],
                                'etat' => 0,
                                'questions_id' => $id,
                            ));
                            //$data->closeCursor(); // Termine le traitement de la requête
                        }
                    }
                }
                echo 1;
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        } else echo "au moins deux réponse";

    } else echo 'check vide';
} else echo "check vide";
?>
