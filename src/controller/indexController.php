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
        $_SESSION['user'] = $user;
        // var_dump($_SESSION['user']);
        if (strcmp($user['role'], "joueur") == 0 && strcmp($user['username'], $_POST['login']) == 0 && strcmp($user['password'], $_POST['password']) == 0) {
            echo 'joueur';
            // header('Location: src/template/joueur/joueur.php');
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
