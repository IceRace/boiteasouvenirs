<?php

session_start();

require_once ('conf/connexion.php');
require_once ('conf/check_connexion.php');
require_once ('conf/fonctions.php');



if(isset($_GET['obj'])&&!empty($_GET['obj']))
{
    switch ($_GET['obj']) {
            
        case "parcours":
            
            $sql_parcours = "SELECT * FROM parcours_lav";
            $sql_parcours .= " WHERE id_parcours_lav=".$_GET['id'];
            $resultats = $connexion->query($sql_parcours);
            $query = $resultats->fetch(PDO::FETCH_OBJ);

            $nom_parcours =  deEchap($query->nom_parcours_lav);
            
            $nompage="supprimer le parcours";
            $nom_obj_sing = "parcours";
            $nom_obj_plur = "parcours";
            $lien_obj = "parcours";
            $id = $query->id_parcours_lav;
            $nom_id = "id_parcours_lav";
            $nom_obj_query = $nom_parcours;
            $nom_bdd = "parcours_lav";
            
            break;
            
        case "velo":
            
            $sql_velo = "SELECT * FROM velos_lav";
            $sql_velo .= " WHERE id_velo_lav=".$_GET['id'];
            $resultats = $connexion->query($sql_velo);
            $query = $resultats->fetch(PDO::FETCH_OBJ);

            $nom_velo =  deEchap($query->nom_velo);
            
            $nompage="supprimer le vélo";
            $nom_obj_sing = "vélo";
            $nom_obj_plur = "vélos";
            $lien_obj = "velo";
            $id = $query->id_velo_lav;
            $nom_id = "id_velo_lav";
            $nom_obj_query = $nom_velo;
            $nom_bdd = "velos_lav";
            break;
    }
}
else{
    header("Location:home");
    exit();
}


if (!empty($_POST)) {
    
    
	$sql_delete = "DELETE FROM ".$nom_bdd; 
    $sql_delete .= " WHERE ".$nom_id." =";
	$sql_delete .= $_POST['id'];
        
/*    
    echo $sql_delete;
    exit();*/
	
	
	if($connexion->exec($sql_delete)) {
		$reussite = $nom_obj_sing;
		$reussite .= " supprimé !";
        header('location:liste?obj='.$lien_obj.'&reussite='.$reussite);
	   exit();
	}
	else {
		$echec = "Erreur lors de la suppression. Merci de réessayer.";
        header('location:liste?obj='.$lien_obj.'&echec='.$echec);
	   exit();
	}


} // fin du if post


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
            <a href="liste?obj=<?php echo $lien_obj; ?>">
                retour
            </a>
        </div>
    </div>
</div>

<div class="main">
    
    <form method="post" class="form suppr_form">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <div class="nom">
            supprimer le <?php echo $nom_obj_sing.' '.$nom_obj_query; ?> ?
        </div>
        <div class="boutons_edition">
            <button type="submit" class="bouton_main">oui</button>
            <div class="bouton_main width_auto_bouton bouton_delete">
                <a href="liste?obj=<?php echo $lien_obj; ?>">
                    non
                </a>
            </div>
        </div>
    </form>

</div>


</body>
</html>