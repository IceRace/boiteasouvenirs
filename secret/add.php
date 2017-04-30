<?php

session_start();

require_once ('conf/connexion.php');
require_once ('conf/check_connexion.php');
require_once ('conf/fonctions.php');

if(isset($_GET['obj'])&&!empty($_GET['obj']))
{
    switch ($_GET['obj']) {
            
        case "parcours":
            
            $nompage="ajouter un parcours";
            $nom_obj_sing = "parcours";
            $nom_obj_plur = "parcours";
            $lien_obj = "parcours";
            $nom_bdd = "parcours_lav";
            
            
            if (!empty($_POST)) {
    
                $nom = echap($_POST["nom"]);
                $description = echap($_POST["description"]);

                $query = "INSERT INTO ".$nom_bdd; 
                $query .= " SET ";
                $query .= ' nom_parcours_lav = "'.$nom.'"';
                $query .= ' , km_parcours_lav = "'.$_POST["distance"].'"'; 
                $query .= ' , duree_parcours_lav = "'.$_POST["duree"].'"'; 
                $query .= ' , description_parcours_lav = "'.$description.'"';
                $query .= ' , lien_infos_parcours_lav = "'.$_POST["lien"].'"';
                
                for($i = 1; $i < 11; ++$i) {
                    
                    $nom_etape='etape'.$i;
                    
                    if(!empty($_POST[$nom_etape])){
                        $query .= ' , etape_parcours_lav_'.$i.' = "'.$_POST[$nom_etape].'"';
                    }
                }
                

                if($connexion->exec($query))
                {
                    $reussite_ajout = $nom_obj_sing." ajouté !";
                    header('location:liste?obj='.$lien_obj.'&reussite='.$reussite_ajout);
                    exit();
                }
                else
                {
                    $echec_ajout = "Erreur lors de l'ajout du ".$nom_obj_sing.". Merci de réessayer.";
                    header('location:liste?obj='.$lien_obj.'&echec='.$echec_ajout);
                    exit();
                }


            } // fin du if post

            
            
            break;
            
        case "velo":
            
            $nompage="ajouter un vélo";
            $nom_obj_sing = "vélo";
            $nom_obj_plur = "vélos";
            $lien_obj = "velo";
            $nom_bdd = "velos_lav";
            $maxsize=2000000;
            
            
            if (!empty($_POST)) {
                
                $prix = convertPrix($_POST['prix']);
                $nom = echap($_POST["nom"]);
                $description = echap($_POST["description"]);
                
                if(isset($_FILES['image']))
                    {                  
                        
                        // on prépare ensuite la vérification d'extension en préparant un tableau d'extensions valides et en extrayant l'extension du fichier uploadé (on ne vérifie pas encore si ça correspond, ça intervient plus bas)
                        $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
                        $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );

                        //Première vérif, la taille. Bizarrement, si la taille dépasse $maxsize, la valeur 0 lui est attribuée : on regarde donc si la taille du fichier vaut 0. Si c'est le cas, on enregistre le message d'erreur.
                        if ($_FILES['image']['size'] == 0) {
                            $erreur = "le fichier est trop gros";
                                                                 }

                        //Une fois qu'on a vérifié que la taille ne posait pas de problème, on vérifie les extensions en vérifiant si l'extension du fichier est bien dans le tableau.
                        elseif ( in_array($extension_upload,$extensions_valides) ) {

                            //Si l'extension est bien valide, on bouge le fichier de place, en le déplaçant du dossier temporaire au dossier final (attribué à la variable $dossier) en lui donnant au passage le nom final.
                             $dossier = '../images/velos/';
                             $fichier = basename($_FILES['image']['name']);
                             if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné
                             {
                                 // si ça a marché, on donne à $reussite la valeur 1
                                  $reussite = 1;
                             }
                             else
                             {
                                 // sinon, on enregistre le message d'erreur.
                                  $erreur = 'échec de l\'upload ';
                             }


                        }

                        // Si l'extension est invalide, on enregistre le message d'erreur
                        else{$erreur = "type de fichier incorrect. Ton fichier doit être une image (jpg, jpeg png ou gif).";}

                        // si $erreur existe, c'est qu'on a forcément eu un message d'erreur, on l'affiche donc.
                        if(isset($erreur)) echo '<p class="msg rouge">Erreur : '.$erreur.'</p>';

                        /*---------------UPLOAD EN BDD --------------*/

                        //On veut passer à l'upload en BDD. Pour ce faire, il faut que le fichier soit bien préparé. Pour l'indiquer, on a attribué plus haut à $reussite la valeur 1. On vérifie donc si $reussite existe et si elle vaut bien 1.
                        if(isset($reussite) && $reussite==1)
                                                        
                        {
 
                            $query = "INSERT INTO ".$nom_bdd; 
                            $query .= " SET ";
                            $query .= ' nom_velo = "'.$nom.'"';
                            $query .= ' , ref_velo = "'.$_POST["ref"].'"';
                            $query .= ' , prix_velo = "'.$prix.'"';
                            $query .= ' , photo_velo = "'.$_FILES['image']['name'].'"';
                            $query .= ' , km_max_velo = "'.$_POST["distance"].'"'; 
                            $query .= ' , duree_max_velo = "'.$_POST["duree"].'"'; 
                            $query .= ' , description_velo = "'.$description.'"';
                            $query .= ' , lien_velo_site = "'.$_POST["lien"].'"';
                            
                            if($_POST['electrique']==1 || !empty($_POST['autonomie'])){
                                $query .= ' , velo_elec = 1';
                                $query .= ' , km_autonomie_velo = "'.$_POST["autonomie"].'"';
                            }
                            
/*                            echo $query;
                            exit();*/

                            if($connexion->exec($query))
                            {
                                $reussite_ajout = $nom_obj_sing." ajouté !";
                                header('location:liste?obj='.$lien_obj.'&reussite='.$reussite_ajout);
                                exit();
                            }
                            else
                            {
                                $echec_ajout = "Erreur lors de l'ajout du ".$nom_obj_sing.". Merci de réessayer.";
                                header('location:liste?obj='.$lien_obj.'&echec='.$echec_ajout);
                                exit();
                            }
                        }

                    }
            } // fin du if post
            
            
            
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
            <a href="liste?obj=<?php echo $lien_obj; ?>">
                retour
            </a>
        </div>
    </div>
</div>

<div class="main">
    <form name="ajout" class="ajout container_form_ajout" method="post" onsubmit="return checkform(this)" enctype="multipart/form-data">
        <button type="submit" class="bouton_main">ajouter le <?php echo $nom_obj_sing; ?></button>
    
    <?php
    
    switch ($nom_obj_sing) {

        case "parcours":
            include("inc/addparcours.php");
            break;

        case "vélo":
            include("inc/addvelo.php");
            break;
    }
    
    ?>
        <button  type="submit" class="bouton_main">ajouter le <?php echo $nom_obj_sing; ?></button>
        <p class="requis"><span>*</span>Ces champs sont requis</p>
    </form>
</div>
</body>
</html>