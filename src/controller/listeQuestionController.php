<?php

//pagination des question par 5
include('../../assets/sql/functionSQL.php');
if (isset($_POST['limit'])) {
    $limit = $_POST['limit'];
    $offset = $_POST['offset'];
    $precedent = $offset - 5;
    try {
        $db = connexionDB();
        $sql = "SELECT  q.*,r.reponse, r.etat  FROM questions q  JOIN  reponses r on r.questions_id =q.id ";
        $data = $db->query($sql);
        $resultat = $data->fetchAll(2);
        $question = [];
        //réeunir les question avec leurs réponses
       //echo json_encode($resultat);
       $j = 0;
        $k=1;
        $question[$j] = [
            "id" => $resultat[0]['id'],
            "question" => $resultat[0]['question'],
            "type" => $resultat[0]['type'],
            "point" => $resultat[0]['point'],
            "reponses" => [
                ["reponse" => $resultat[0]['reponse'],
                    "etat" => $resultat[0]['etat'],
                ]
            ],
        ];
        for ($i =1 ; $i< count($resultat); $i++ ){
            if ( $question[$j]['id'] == $resultat[$i]['id'] ){
                $question[$j]['reponses'][$k]["reponse"]=  $resultat[$i]['reponse'];
                $question[$j]['reponses'][$k]["etat"]=  $resultat[$i]['etat'];
                $k++;
            }
            else{
                $j++;
                $k =1;
                $question[$j] = [
                    "id" => $resultat[$i]['id'],
                    "question" => $resultat[$i]['question'],
                    "type" => $resultat[$i]['type'],
                    "point" => $resultat[$i]['point'],
                    "reponses" => [
                        ["reponse" => $resultat[$i]['reponse'],
                            "etat" => $resultat[$i]['etat'],
                        ]
                    ],
                ];
            }
        }

               echo json_encode($question);
            $data->closeCursor(); // Termine le traitement de la requête
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
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
