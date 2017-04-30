<?php

session_start();

require_once ('conf/connexion.php');
require_once ('conf/check_connexion.php');
require_once ('conf/fonctions.php');

$nompage="accueil";

?>

<?php require("head.php"); ?>

<div class="main">
    
    <div class="selecteur">
        <div class="nom">
            <a href="liste?obj=parcours">
            gérer les parcours
            </a>
        </div>
        <div class="nom">
            <a href="liste?obj=velo">
                gérer les vélos
            </a>
        </div>
    </div>


</div>
</body>
</html>