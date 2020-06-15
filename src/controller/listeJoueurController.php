<?php

//pagination des question par 5
include('../../assets/sql/functionSQL.php');
if (isset($_POST['limit'])) {
    $limit = $_POST['limit'];
    $offset = $_POST['offset'];
    $precedent = $offset - 5;
    $teste = $_POST['teste'];
    if ($teste == 0) {
        listeJoueurAdmin($limit, $offset);
    }

} //verroue d'un joueur
else if (isset($_POST['id'])) {
    $id = $_POST['id'];
    try {
        $db = connexionDB();
        //récupération de l'attribut vérrou de user
        $sql = "SELECT  verrou FROM user WHERE  id = ${id} ";
        $data = $db->query($sql);
        $user = $data->fetch();
        $verrou = $user['verrou'];
        $data->closeCursor(); // Termine le traitement de la requête


        if ($verrou == 0) {
            // modification de l'atribut verrou du joueur
            $sql = "UPDATE user u set u.verrou = 1 where id= ${id}; ";
            $data = $db->query($sql);
            $data->closeCursor(); // Termine le traitement de la requête
            echo 1;
        } else {
            // modification de l'atribut verrou du joueur
            $sql = "UPDATE user u set u.verrou = 0 where id= ${id}; ";
            $data = $db->query($sql);
            $data->closeCursor(); // Termine le traitement de la requête
            echo 0;
        }

    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }


} else echo 'erreur lors de la récupération des donnée';


?>
