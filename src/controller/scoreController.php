<?php
include('../../assets/sql/functionSQL.php');
$db = connexionDB();
if (@$_POST['id']) {
    $id = $_POST['id'];
    $limit = $_POST['limit'];
    try {
        $sql = "SELECT  s.date_jeux ,s.score FROM score s
                     WHERE s.user_id=${id}
                     ORDER BY s.score DESC LIMIT ${limit}";
        $data = $db->query($sql);
        $user = $data->fetchAll(2);
        echo json_encode($user);
        $data->closeCursor(); // Termine le traitement de la requête
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

} else if ($_POST['limit']) {
    $limit = $_POST['limit'];
    try {
        $sql = "SELECT  u.id ,u.prenom,u.nom, s.score FROM user u
                    JOIN score s on u.id = s.user_id
                     WHERE u.role='joueur'
                     ORDER BY s.score DESC LIMIT ${limit}";
        $data = $db->query($sql);
        $users = $data->fetchAll(2);
        $data->closeCursor(); // Termine le traitement de la requête
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    echo json_encode($users);

}  else
echo 0;
?>
