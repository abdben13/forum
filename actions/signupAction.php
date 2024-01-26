<?php 
require('actions/database.php');

if(isset($_POST['validate'])){
    if(!empty($_POST['pseudo'])  AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password']));
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if($checkIfUserAlreadyExists->rowCount() == 0){
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users (pseudo, nom, prenom, mdp) VALUES (?,?,?,?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));
        }else{
            $errorMsg = "L'utilisateur existe déjà";
        }
}else {
    $errorMsg = "Veuillez compléter tous les champs";
}

?>