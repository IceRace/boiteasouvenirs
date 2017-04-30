<?php
session_start();

if(isset($_GET['end_session']) && $_GET['end_session']==1){
	$_SESSION['logged'] = false;

}

if(isset($_SESSION['logged'])&& $_SESSION['logged']== true) {
	header('location:home');
	exit();
}


require_once ('conf/connexion.php');


if (!empty($_POST)) {
	$sql_login = "SELECT * FROM lav_users WHERE login_lav = '".$_POST['login']."' AND mdp_lav='".$_POST['mdp']."'";
	$resultat_login = $connexion->query($sql_login);
	$user = $resultat_login->fetch(PDO::FETCH_OBJ);
            
    
	if (!empty($user->id_user_lav)) {
		$_SESSION['logged'] = true;
		$reussite_ajout = "Bienvenue ! :)";
        header('location:home?reussite='.$reussite_ajout);
		exit();
	}

	else {
		$_SESSION['logged'] = false;
		$echec_ajout = "Nous n'avons pas pu te connecter. Merci de réessayer.";
        header('location:index?echec='.$echec_ajout);
	}
	
}

$nompage="connexion";

?>

<?php require("head.php"); ?>
            <div class="main index">
                <div class="selecteur">
                    <div class="nom">
                        connecte-toi pour gérer la webapp
                    </div>
                </div>
                <form method="post" class="form">
                    <input type="hidden" name="id" />
                    <input class="" type="text" name="login" placeholder="Nom d'utilisateur" id="login" required />
                    <input class="" type="password" name="mdp" placeholder="Mot de passe" id="mdp" required/>
                    <button type="submit" class="bouton_main">connexion</button>
                </form>
            </div>

</body>
</html>