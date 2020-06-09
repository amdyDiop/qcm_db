<?php
//connexion à la base de donnée
function connexionDB()
{
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
//initialisation score  joueur
function scoreIni($user){
    try {
        $db = connexionDB();
        $sql = 'INSERT INTO score (score,user_id) VALUES(:score,:user_id)';
        $db =  $db->prepare($sql);
        $db->execute(array(
            'score' => 0,
            'user_id' =>$user,
        ));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
function getID($login){
    try{
        $db = connexionDB();
        $sql = 'SELECT user.id  FROM user WHERE  username="'.$login.'"';
        $db =  $db->query($sql);
        $id = $db->fetch();
        $id= $id['id'];
    }catch (Exception $e){
        die('ERREUR :' .$e->getMessage());
    }
    return $id;
}
//echo ' id baa gui noodou fils '.getID("");
//scoreIni(getID('joueur'))
//ajoute des question
function insertData($question, $type, $point)
{
    try {
        $db = connexionDB();

        $sql = "INSERT INTO questions (question,type,point)  VALUE(:question, :typeq,:point) ";
        $data = $db->prepare($sql);
        $data->execute(array(
            'question' => $question,
            'typeq' => $type,
            'point' => $point,
        ));
        $data->closeCursor(); // Termine le traitement de la requête

    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
//recuperation question id
function findIDQuestion($question)
{
    $db = connexionDB();
    $sql = "SELECT id FROM questions WHERE  question =\"${question}\" ";
    $data = $db->query($sql);
    $id = $data->fetch();
    $id = $id['id'];
    $data->closeCursor(); // Termine le traitement de la requête
    return $id;
}
?>
