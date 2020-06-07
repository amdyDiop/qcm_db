<?php
include('../../assets/sql/functionSQL.php');
session_start();

if (isset($_FILES['file'])) {
    if (existeLogin($_POST['login']) == "true") {
        echo "login existe";
    } else {
        $filename = $_POST['login'];
        $login = $_POST['login'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $role = $_POST['role'];
        $password = $_POST['password'];
        if (!empty($login) && !empty($prenom) && !empty($nom) && !empty($password)) {
            $target_directory = "../../assets/Images/user/";
            $target_file = $target_directory . basename($_FILES["file"]["name"]);   //name is to get the file name of uploaded file
            $filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $newfilename = $target_directory . $filename . "." . $filetype;
            $image = $filename . "." . $filetype;
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $newfilename)) {
                try {
                    $bdd = connexionDB();
                    $sql = 'INSERT INTO user (nom,prenom,username,password,role,image,verrou) VALUES(:nom,:prenom,:username,:password,:role,:image,:verrou)';
                    $bdd = $bdd->prepare($sql);
                    $bdd->execute(array(
                        'nom' => $nom,
                        'role' => $role,
                        'prenom' => $prenom,
                        'username' => $login,
                        'password' => $password,
                        'image' => $image,
                        'verrou' => 0,
                    ));
                    //initialisation score du joueur avec les deux function definie dans le dossier functionSQL.php
                    scoreIni(getID($login));

                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }
                echo 1;
            } else
                echo 0;

        }
    }
}
?>
