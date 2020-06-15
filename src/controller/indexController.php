<?php
include ('../../assets/sql/functionSQL.php');
if ($_POST) {
    try {
        $db =connexionDB();
        $data = $db->query('SELECT * FROM user WHERE username="' . $_POST['login'] . '"');
        $user = $data->fetch();
        $data->closeCursor(); // Termine le traitement de la requête
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    if (!empty($user)) {
        session_start();
        // var_dump($_SESSION['user']);
        if (strcmp($user['role'], "joueur") == 0 && strcmp($user['username'], $_POST['login']) == 0 && strcmp($user['password'], $_POST['password']) == 0) {
           $_SESSION['questions']= selectQuestionJeux(5);
            $_SESSION['user'] = $user;
            $_SESSION['tabReponses'] = [];
            $_SESSION['pageCourant'] = 1;
            $_SESSION['score'] = 0;
            $_SESSION['addScore'] = 1; //pour ajouer une fois le score
            $_SESSION['jeux'] = "reponseQuestion.php";
            for ($i = 0; $i < count($_SESSION['questions']); $i++) {
                $_SESSION['tabReponses'][$i]['question'] = $_SESSION['questions'][$i]['question'];
                $_SESSION['tabReponses'][$i]['point'] = $_SESSION['questions'][$i]['point'];
                $_SESSION['tabReponses'][$i]['type'] = $_SESSION['questions'][$i]['type'];
                $_SESSION['tabReponses'][$i]['reponses'] = $_SESSION['questions'][$i]['reponses'];
                $_SESSION['tabReponses'][$i]['clicked'] = [];
            }
            echo 'joueur';

        } else if (strcmp($user['role'], "admin") == 0 && strcmp($user['username'], $_POST['login']) == 0 && strcmp($user['password'], $_POST['password']) == 0) {
            $_SESSION['admin'] = $user;
            echo 'admin';
           // header('Location: src/template/admin/admin.php');
        } else {
            echo 'password not found';
        }
    } else {
        echo "not found";
    }

}



?>
