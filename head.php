<?php

    $pages = array (
    0=>array("nom"=>"accueil" ,"lien"=>"index" ,"icone"=>"move_to_inbox" ,"nom_public"=>"Accueil"),
    1=>array("nom"=>"photos" ,"lien"=>"photos" ,"icone"=>"photo_library" ,"nom_public"=>"Photos"),
    2=>array("nom"=>"videos" ,"lien"=>"videos" ,"icone"=>"video_library" ,"nom_public"=>"Vidéos"),
    3=>array("nom"=>"anecdotes" ,"lien"=>"anecdotes" ,"icone"=>"chat" ,"nom_public"=>"Anecdotes"),
    4=>array("nom"=>"moments" ,"lien"=>"moments" ,"icone"=>"save" ,"nom_public"=>"Moments"),
);

?>

<!doctype html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
    <title>LA BOÎTE À SOUVENIRS</title>
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animations.css">        
    <!-- POLICES -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
    
<body>
    <div class="top_menu <?php if($nompage=='accueil'){echo ' no_shadow';}; ?>">
       
       <?php
        
            $i = 0;
            foreach($pages as $i)
                {

                    echo '<a class="material-icons';
                    if($nompage==$i['nom']){echo ' active';};
                    echo '" ';
                    echo 'href="'.$i['lien'].'" title="'.$i['nom_public'].'">'.$i['icone'];
                    echo '</a>';

                }   

            ?>
       
    </div>
    <div class="wrapper">