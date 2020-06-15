<?php
//connexion à la base de donnée
function connexionDB()
{
    return new PDO('mysql:host=localhost;dbname=mini_projet_qcm;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

function existeLogin($login)
{
    try {
        $bd = connexionDB();
        $data = $bd->query('SELECT * FROM user WHERE username="' . $_POST['login'] . '"');
        $user = $data->fetch();
        $data->closeCursor(); // Termine le traitement de la requête
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    if (!empty($user))
        return true;
    return false;
}

//initialisation score  joueur
function scoreIni($user)
{
    try {
        $db = connexionDB();
        $sql = 'INSERT INTO score (score,user_id) VALUES(:score,:user_id)';
        $db = $db->prepare($sql);
        $db->execute(array(
            'score' => 0,
            'user_id' => $user,
        ));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function insertScore($user, $score)
{
    try {
        $db = connexionDB();
        $sql = 'INSERT INTO score (score,user_id) VALUES(:score,:user_id)';
        $db = $db->prepare($sql);
        $db->execute(array(
            'score' => $score,
            'user_id' => $user,
        ));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function getID($login)
{
    try {
        $db = connexionDB();
        $sql = 'SELECT user.id  FROM user WHERE  username="' . $login . '"';
        $db = $db->query($sql);
        $id = $db->fetch();
        $id = $id['id'];
    } catch (Exception $e) {
        die('ERREUR :' . $e->getMessage());
    }
    return $id;
}


//echo ' id baa gui noodou fils '.getID("");
//scoreIni(getID('joueur'))
//ajoute des question
function insertData($question, $type, $point)
{
    try {
        $db = connexionDB();

        $sql = "INSERT INTO questions (question,type,point)  VALUE(:question, :typeq,:point) ";
        $data = $db->prepare($sql);
        $data->execute(array(
            'question' => $question,
            'typeq' => $type,
            'point' => $point,
        ));
        $data->closeCursor(); // Termine le traitement de la requête

    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function listeJoueurAdmin($limit, $offset)
{
    try {
        $db = connexionDB();
        $sql = "SELECT u.id ,u.prenom,u.nom, s.score, u.image,u.verrou FROM user u 
            JOIN score s on u.id = s.user_id WHERE u.role='joueur'
            group by u.id ORDER BY s.score DESC LIMIT ${limit}  OFFSET ${offset}";
        $data = $db->query($sql);
        $user = $data->fetchAll(2);
        echo json_encode($user);
        $data->closeCursor(); // Termine le traitement de la requête
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function inserInUserQuestion($idUser, $idQuestion)
{
    try {
        $db = connexionDB();

        $sql = "INSERT INTO user_question (questions_id,user_id,trouver)  VALUE(:idQ, :idU,1) ";
        $data = $db->prepare($sql);
        $data->execute(array(
            'idQ' => $idUser,
            'idU' => $idQuestion,
        ));
        $data->closeCursor(); // Termine le traitement de la requête
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

//recuperation question id
function findIDQuestion($question)
{
    $db = connexionDB();
    $sql = "SELECT id FROM questions WHERE  question =\"${question}\" ";
    $data = $db->query($sql);
    $id = $data->fetch();
    $id = $id['id'];
    $data->closeCursor(); // Termine le traitement de la requête
    return $id;
}

/*
getQuestion($question){
    try {
        $db =connexionDB();
        $user = $data->fetch();
        $data->closeCursor(); // Termine le traitement de la requête
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}*/
function selectQuestionAdmin($limit, $offset)
{
    try {
        $questions = [];
        $reponsess = [];
        $db = connexionDB();
        $sql = "SELECT  *  FROM questions q  ORDER BY id DESC LIMIT ${limit} 
                       OFFSET ${offset}";
        $data = $db->query($sql);
        $questions = $data->fetchAll(2);
        $data->closeCursor(); // Termine le traitement de la requête
        //réeunir les question avec leurs réponses
        for ($i = 0; $i < count($questions); $i++) {
            $id = $questions[$i]['id'];
            $reponses = $db->prepare('SELECT r.reponse,r.etat FROM reponses r WHERE r.questions_id = :id');
            $reponses->execute(array('id' => $id));
            //  $sql = "SELECT r.reponse, r.etat  FROM reponses r  where r.questions_id=${$id} ";
            $questionReponses = $reponses->fetchAll(2);
            $questions[$i]['reponses'] = $questionReponses;
        }
        // echo json_encode($reponsess );
        //  echo json_encode($questions);

        $data->closeCursor(); // Termine le traitement de la requête
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    return $questions;
}

function selectQuestionJeux($limit)
{
    try {
        $questions = [];
        $reponsess = [];
        $db = connexionDB();
        $sql = "SELECT *  from questions  ORDER BY  RAND() limit ${limit}";
        $data = $db->query($sql);
        $questions = $data->fetchAll(2);
        $data->closeCursor(); // Termine le traitement de la requête
        //réeunir les question avec leurs réponses
        for ($i = 0; $i < count($questions); $i++) {
            $id = $questions[$i]['id'];
            $reponses = $db->prepare('SELECT r.reponse,r.etat FROM reponses r WHERE r.questions_id = :id');
            $reponses->execute(array('id' => $id));
            //  $sql = "SELECT r.reponse, r.etat  FROM reponses r  where r.questions_id=${$id} ";
            $questionReponses = $reponses->fetchAll(2);
            $questions[$i]['reponses'] = $questionReponses;
        }
        // echo json_encode($reponsess );
        //  echo json_encode($questions);

        $data->closeCursor(); // Termine le traitement de la requête
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    return $questions;
}

?>
