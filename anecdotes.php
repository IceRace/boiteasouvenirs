<?php $nompage = "anecdotes"; ?>
<?php require ("head.php");?>
<?php $i = 0; ?>
    <div class="main">
       <h2 class="animation fadeInLeft titre_page"><?php foreach($pages as $i){ if($nompage==$i['nom']){echo $i['nom_public'];}} ?></h2>
    
    </div>
</div> <!--FIN DE WRAPPER-->
    
<script src="js/script.js"></script>
    
</body>
</html>