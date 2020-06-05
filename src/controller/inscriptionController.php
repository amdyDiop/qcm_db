<?php
include('functionSQL.php');
session_start();

/**
 * if (isset($_FILES['file'])) {
 * if (existeLogin($_POST['login']) == "true") {
 * echo "login existe";
 * } else {
 * $login = $_POST['login'];
 * $prenom = $_POST['prenom'];
 * $nom = $_POST['nom'];
 * $password = $_POST['password'];
 * $file = $_FILES['file'];
 * if (!empty($login) && !empty($prenom) && !empty($nom) && !empty($password)){
 * //1. strrchr renvoie l'extension avec le point (« . »).
 * //2. substr(chaine,1) ignore le premier caractère de chaine.
 * //3. strtolower met l'extension en minuscules.
 * $extension = strtolower(substr(strrchr($_FILES['file']['name'], '.'), 1));
 * $chemin = "../../assets/Images/user/{$_POST['login']}.{$extension}";
 * $resultat = move_uploaded_file($_FILES['file']['tmp_name'], $chemin);
 * $image = "{$_POST['login']}.{$extension}";
 * try {
 * $bdd = connexionDB();
 * $sql = 'INSERT INTO user (nom,prenom,username,password,role,image) VALUES(:nom,:prenom,:username,:password,:role,:image)';
 * $bdd = $bdd->prepare($sql);
 * $bdd->execute(array(
 * 'nom' => $nom,
 * 'role' => "joueur",
 * 'prenom' => $prenom,
 * 'username' => $login,
 * 'password' => $password,
 * 'image' => $image,
 * ));
 * if ($bdd) {
 * echo "success";
 * } else {
 * echo "error";
 * }
 * } catch (Exception $e) {
 * die('Erreur : ' . $e->getMessage());
 * }
 * }
 * else{
 * echo 'dougouleeee';
 * echo $file;
 * }
 * }
 * }
 */

if (isset($_FILES['file'])) {
    if (existeLogin($_POST['login']) == "true") {
        echo "login existe";
    }
    else {
        $filename = $_POST['login'];
        $login = $_POST['login'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $password = $_POST['password'];
        if (!empty($login) && !empty($prenom) && !empty($nom) && !empty($password)) {
            $target_directory = "../../assets/Images/user/";
            $target_file =  $target_directory . basename($_FILES["file"]["name"]);   //name is to get the file name of uploaded file
            $filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $newfilename = $target_directory.$filename.".".$filetype;
            $image =$filename.".".$filetype;
            try {
                $bdd = connexionDB();
                $sql = 'INSERT INTO user (nom,prenom,username,password,role,image) VALUES(:nom,:prenom,:username,:password,:role,:image)';
                $bdd = $bdd->prepare($sql);
                $bdd->execute(array(
                    'nom' => $nom,
                    'role' => "joueur",
                    'prenom' => $prenom,
                    'username' => $login,
                    'password' => $password,
                    'image' => $image,
                ));
                //initialisation score du joueur avec les deux function definie dans le dossier functionSQL.php
                scoreIni(getID($login));
                if(move_uploaded_file($_FILES["file"]["tmp_name"],$newfilename)) echo 1;
                else echo 0;
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        }
    }
}
?>
