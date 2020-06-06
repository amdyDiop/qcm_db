<?php

//pagination des question par 5
include('../../assets/sql/functionSQL.php');
if (isset($_POST['limit'])) {
    $limit = $_POST['limit'];
    $offset = $_POST['offset'];
    $precedent = $offset-5;
    $teste = $_POST['teste'];
    if ($teste == 0) {
        try {
            $db = connexionDB();
            $sql = "SELECT u.id ,u.prenom,u.nom, s.score, u.image FROM user u  
                    JOIN score s on u.id = s.user_id
                     WHERE u.role='joueur' 
                     ORDER BY s.score DESC LIMIT {$limit} 
                       OFFSET {$offset}";

            $data = $db->query($sql);
            $user = $data->fetchAll(2);
            echo json_encode($user);
            $data->closeCursor(); // Termine le traitement de la requête
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    else{
        try {
            $db = connexionDB();
            $sql = " SELECT * FROM user  WHERE role='joueur' AND  id  BETWEEN {$precedent} AND {$offset} ORDER BY id DESC  LIMIT 5;";
            $data = $db->query($sql);
            $user = $data->fetchAll(2);
            echo json_encode($user);
            $data->closeCursor(); // Termine le traitement de la requête
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

    }


}

//verroue d'un joueur
else if (isset($_POST['id'])){
    $id =$_POST['id'];
    try {
        $db = connexionDB();
        //récupération de l'attribut vérrou de user
        $sql = "SELECT  verrou FROM user WHERE  id = ${id} ";
        $data = $db->query($sql);
        $user = $data->fetch();
        $verrou = $user['verrou'];
        $data->closeCursor(); // Termine le traitement de la requête


        if($verrou== 0){
            // modification de l'atribut verrou du joueur
            $sql = "UPDATE user u set u.verrou = 1 where id= ${id}; ";
            $data = $db->query($sql);
            $data->closeCursor(); // Termine le traitement de la requête
            echo 1;
        }
        else{
            // modification de l'atribut verrou du joueur
            $sql = "UPDATE user u set u.verrou = 0 where id= ${id}; ";
            $data = $db->query($sql);
            $data->closeCursor(); // Termine le traitement de la requête
            echo 0;
        }

    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }


}
else echo 'erreur lors de la récupération des donnée';


?>
