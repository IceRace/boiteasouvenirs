<?php

session_start();

require_once ('conf/connexion.php');
require_once ('conf/check_connexion.php');
require_once ('conf/fonctions.php');


if(isset($_GET['obj'])&&!empty($_GET['obj']))
{
    switch ($_GET['obj']) {
            
        case "parcours":
            
            $nompage="gérer les parcours";
            $nom_obj_sing = "parcours";
            $nom_obj_plur = "parcours";
            $lien_obj = "parcours";
            break;
            
        case "velo":
            
            $nompage="gérer les vélos";
            $nom_obj_sing = "vélo";
            $nom_obj_plur = "vélos";
            $lien_obj = "velo";
            break;
    }
}
else{
    header('Location:home.php');
    exit();
}


?>

<?php require("head.php"); ?>

<div class="head_liste">
    <div class="selecteur">
        <div class="nom">
            <?php echo $nompage; ?>
        </div>
    </div>
    <div class="boutons">
            <div class="bouton_main bouton_retour width_auto_bouton">
            <a href="home">
                retour
            </a>
        </div>
        <div class="bouton_main width_auto_bouton">
            <a href="add?obj=<?php echo $lien_obj; ?>">
                ajouter un <?php echo $nom_obj_sing; ?>
            </a>
        </div>
    </div>
</div>

<div class="main">
    
    <?php
    
    switch ($nom_obj_sing) {

        case "parcours":
            include("inc/listeparcours.php");
            break;

        case "vélo":
            include("inc/listevelos.php");
            break;
    }
    
    ?>

</div>

</body>
</html>