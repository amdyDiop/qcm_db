<?php

//pagination des question par 5
include('../../assets/sql/functionSQL.php');
if (isset($_POST['limit'])) {
    $limit = $_POST['limit'];
    $offset = $_POST['offset'];
     echo  json_encode(selectQuestionAdmin($limit,$offset));
}

else if (isset($_POST['idDelete'])){
  $id= $_POST['idDelete'];
  //suppresions des réponse avant de supprimé la question pour les question d'intégrités
    deleteReponses($id);
    deleteQuestion($id);
echo "success";

}
else echo 'erreur lors de la récupération des donnée';


?>
