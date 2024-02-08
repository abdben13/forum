<?php 
    require('../actions/database.php');

        //Recuperation de la question "présentation"
        $getQuestionPresentation = $bdd->query('SELECT id, id_auteur, titre, contenu, pseudo_auteur, date_publication FROM questions WHERE id = 1');
        $getQuestionPresentationData = $getQuestionPresentation->fetch();

        //Recuperation de toutes les questions
        $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, contenu, pseudo_auteur, date_publication FROM questions ORDER BY id DESC');

        //Verifie si une recherche a été rentrée par l'utilisateur
        if(isset($_GET['search']) AND !empty($_GET['search'])) {

            //La recherche
            $usersSearch = $_GET['search'];

            //Récuperation de toutes les questions correspondant à la recherche (en fonction du titre)
            $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, contenu, pseudo_auteur, date_publication FROM questions WHERE titre LIKE "%'.$usersSearch.'%" ORDER BY id DESC');

        }
?>