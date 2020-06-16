<?php

//pagination des question par 5
include('../../assets/sql/functionSQL.php');
if (isset($_POST['limit'])) {
    $limit = $_POST['limit'];
    $offset = $_POST['offset'];
      echo json_encode(getAdmins($limit,0));
    }

elseif (isset($_POST['infoAdmin'])) {
    $id = $_POST['infoAdmin'];
    echo json_encode(getAdminById($id));
}
else if (isset($_POST['username'])) {

    $id =$_POST['id'];
    $username =$_POST['username'];
    $prenom =$_POST['prenom'];
    $nom =$_POST['nom'];
    $role =$_POST['role'];

    try {

        $db = connexionDB();
        // modification de l'atribut verrou du joueur
        $sql = "UPDATE  SET username = ${username}, prenom = ${prenom},nom = ${nom}
        role = ${role} WHERE id= ${id} ";
       $data = $db->query($sql);
       $data->closeCursor(); // Termine le traitement de la requête
        //  echo 1;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    echo 1;
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
