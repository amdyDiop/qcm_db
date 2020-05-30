<?php
$error = "";

include('src/controller/joueurController.php');

$error="";
$errorP = "";
if(isset($_POST['login'])){
    try
    {
        $bd = new PDO('mysql:host=localhost;dbname=mini_projet_qcm;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $data= $bd->query('SELECT * FROM user WHERE username="'.$_POST['login'].'"');
        $user = $data->fetch();
        $data->closeCursor(); // Termine le traitement de la requête
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    if (!empty($user)  ){
        session_start();
        $_SESSION['user'] = $user;
        // var_dump($_SESSION['user']);
        if (strcmp($user['role'],"joueur")==0 && strcmp($user['username'],$_POST['login'])==0 && strcmp($user['password'],$_POST['password'])==0  ) {
            header("Content-type: image/jpg");
            echo $img['image'];
            header('Location: src/template/joueur/joueur.php');
        }
        else if (strcmp($user['role'],"admin")==0 && strcmp($user['username'],$_POST['login'])==0 && strcmp($user['password'],$_POST['password'])==0  ) {
            $_SESSION['admin'] = $user;
            header('Location: src/template/admin/admin.php');
        }
        else {
            $errorP = "mot de passe incorrecte ";
        }
    }
    else{

        $error = "Cet utilisateur n'a pas de compte? inscrivez-vous pour se connecter";
    }

}
?>
