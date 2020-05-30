<?php
//verification de l'existence du login


function connexionDB(){
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


?>
