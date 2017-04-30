<?php

$deconnexion="Tu as bien été déconnecté !";

    $pages = array (
    0=>array("nom"=>"accueil" ,"lien"=>"home"),
    1=>array("nom"=>"gérer les parcours" ,"lien"=>"liste?obj=parcours"),
    2=>array("nom"=>"gérer les vélos" ,"lien"=>"liste?obj=velo"),
    3=>array("nom"=>"se déconnecter" ,"lien"=>"index?end_session=1&reussite=$deconnexion"),
);

?>

<!doctype html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
    <title>GESTION DE LA WEBAPP LOIRE A VELO</title>
    <link rel="icon" type="image/png" href="/images/favicon.gif" />
    <link rel="stylesheet" href="/css/animations.css">        
    <link rel="stylesheet" href="css/style.css">        
    <!-- POLICES -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700|Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>
        <?php // récupération des messages de confirmation/d'erreur
    
    if(!empty($_GET['echec'])) {
		echo '<p class="msg rouge">'.$_GET['echec'].'</p>';
	}

	if(!empty($_GET['reussite'])) {
		echo '<p class="msg vert">'.$_GET['reussite'].'</p>';
	}

?>

    <div class="menu" id="menu">
        <i class="close material-icons" id="close">close</i>
        <ul>
            <?php
        
            $i = 0;
            foreach($pages as $i)
                {
                    echo '<li><a class="';
                    if($nompage==$i['nom']){echo 'active';};
                    echo '" ';
                    echo 'href="'.$i['lien'].'">'.$i['nom'];
                    echo '</a></li>';
                }   

            ?>
        </ul>
    </div>
    <?php if($nompage!=="connexion"){ ?><i class="hamburger material-icons" id="open">menu</i><?php } ?>
    <body>