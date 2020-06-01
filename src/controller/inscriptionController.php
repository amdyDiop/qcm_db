<?php
//verification de l'existence du login
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

session_start();
$error = "";
if (isset($_POST['prenom'])) {
    if (existeLogin($_POST['login']) == "true") {
        echo "login existe";
    } else {
        $login = $_POST['login'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $password = $_POST['password'];
        $file = $_FILES['file'];
        if (isset($login) && isset($prenom) && isset($nom) && isset($password)  ){
            //1. strrchr renvoie l'extension avec le point (« . »).
            //2. substr(chaine,1) ignore le premier caractère de chaine.
            //3. strtolower met l'extension en minuscules.
            $extension = strtolower(substr(strrchr($_FILES['file']['name'], '.'), 1));
            $chemin = "../../../assets/Images/user/{$_POST['login']}.{$extension}";
            $resultat = move_uploaded_file($_FILES['file']['tmp_name'], $chemin);
            $image = "{$_POST['login']}.{$extension}";
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
                if ($bdd) {
                    echo "Fichier uploadé avec succès.";
                } else {
                    echo "Échec d'upload du fichier.";
                }
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        }
    }
}

?>
