<?php



//fonction qui recupére un joueur en fonction de sont mot de passse et de son login
function getJoueur()
{
    $files = '../../../assets/json/user.json';
    $db = file_get_contents($files);
    $db = json_decode($db, true);
    $joueurs = [];
    for ($i = 0; $i < count($db); $i++) {
        if (!strcmp($db[$i]['role'], "joueur")) {
            $joueurs[] = $db[$i];
        }
    }
    for ($i = 0; $i < count($joueurs) - 1; $i++) {

        for ($j = $i; $j < count($joueurs); $j++) {

            if ($joueurs[$i]['score'] < $joueurs[$j]['score']) {
                $temp = $joueurs[$i];
                $joueurs[$i] = $joueurs[$j];
                $joueurs[$j] = $temp;
            }
        }
    }
    return $joueurs;
}


//fonction selection des question aleatoirement
function questionRand($user,$cheminNbQuestion,$cheminQuestions,$redirection)
{
    $nonrepondue = [];
    $nbquestion = file_get_contents($cheminNbQuestion);
    $questions = file_get_contents($cheminQuestions);
    $questions = json_decode($questions, true);
    // var_dump($questions);
    for ($j = 0; $j < count($questions); $j++) {
        if (in_array($j,$user->repondue)) {
            //echo 'magui si if bi';
        } else{
            //echo 'maagui si else bi';
            $nonrepondue[] = $questions[$j];
            //break;
        }
    }
    //var_dump($nonrepondue);
    $i=0;
    $return=[];
    if (count($nonrepondue)==0){
        header($redirection);
    }
    while ($i<$nbquestion) {
        $teste=0;
        $valeur = random_int(0, count($nonrepondue)-1);
        for ($j = 0; $j < count($return); $j++) {
            if (($nonrepondue[$valeur]['question']===$return[$j]['question'])){
                $teste=1;
                break;
            }
        }
        if ($teste ==0){
            $return[] = $nonrepondue[$valeur];
            $i++;
        }
        if ($i==count($nonrepondue)){
            break;
        }
    }
    // var_dump($return);
    return $return;
}


function traitementQuestion(){
    $position = $_SESSION['pageCourant'] - 1;
    //traitetement pour sauvegarder les reponses precédents
    if ($_SESSION['tabReponses'][$position]['type'] === "multiple") {
        for ($i = 0; $i < count($_SESSION['tabReponses'][$position]['reponses']); $i++) {
            if (isset($_POST['checbox' . $i . ''])) {
                $_SESSION['tabReponses'][$position]['clicked'][$i] = 1;
            } else
                $_SESSION['tabReponses'][$position]['clicked'][$i] = 0;
        }
    }
    if ($_SESSION['tabReponses'][$position]['type'] === "simple") {
        //   echo $_POST['radio'];
        for ($i = 0; $i < count($_SESSION['tabReponses'][$position]['reponses']); $i++) {
            if (isset($_POST['radio']) && $_POST['radio'] == "radio" . $i . "") {
                $_SESSION['tabReponses'][$position]['clicked'] = $i;
            }
         //   else
           ///     $_SESSION['tabReponses'][$position]['clicked'] = 0;

        }
    }
    if ($_SESSION['tabReponses'][$position]['type'] === "texte") {
        $_SESSION['tabReponses'][$position]['clicked'][0]  = $_POST['texte'];
    }

    //var_dump($_SESSION['tabReponses'][$position]);
    //echo $_SESSION['tabReponses'][$position]['clecked'];
}
?>
