<?php

//pagination des question par 5
include('../../assets/sql/functionSQL.php');
if (isset($_POST['limit'])) {
    $limit = $_POST['limit'];
    $offset = $_POST['offset'];
        try {
            $db = connexionDB();
            $sql = "SELECT u.id ,u.prenom,u.nom, u.image FROM user u  
                     WHERE u.role='admin' 
                     ORDER BY id DESC LIMIT {$limit} 
                       OFFSET {$offset}";
            $data = $db->query($sql);
            $user = $data->fetchAll(2);
            echo json_encode($user);
            $data->closeCursor(); // Termine le traitement de la requête
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
else if (isset($_POST['infoAdmin'])) {

    $id =$_POST['infoAdmin'];
   try {
        $db = connexionDB();
        // modification de l'atribut verrou du joueur
        $sql = "SELECT  * FROM user where id= ${id} ";
       $data = $db->query($sql);
       $user = $data->fetchAll(2);
       echo json_encode($user);
       $data->closeCursor(); // Termine le traitement de la requête
        //  echo 1;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
else if (isset($_POST['id'])) {
    $id =$_POST['id'];
    try {
        $db = connexionDB();

            // modification de l'atribut verrou du joueur
            $sql = "DELETE user FROM user where id= ${id} ";
            $data = $db->query($sql);
            $data->closeCursor(); // Termine le traitement de la requête
          //  echo 1;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    echo 1;
}
else echo "dougoumadé";

?>
