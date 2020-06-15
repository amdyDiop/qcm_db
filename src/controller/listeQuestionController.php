<?php

//pagination des question par 5
include('../../assets/sql/functionSQL.php');
if (isset($_POST['limit'])) {
    $limit = $_POST['limit'];
    $offset = $_POST['offset'];
     echo  json_encode(selectQuestionAdmin($limit,$offset));
}
else echo 'erreur lors de la récupération des donnée';


?>
