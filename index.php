<?php $nompage = "accueil"; ?>
<?php require ("head.php");?>
    <div class="main fullpage accueil">
        <div class="message_accueil">
            <div class="animation fadeInDown">
                <i class="material-icons">move_to_inbox</i>
                <h1>La Boîte à Souvenirs</h1>
                <p>Bonjour Maxime, bienvenue dans tes souvenirs :)</p>
            </div>
        </div>
        <div class="souvenirs animation fadeInUp">
            <div class="item">
                <a href="photos">
                    <i class="icone material-icons photos" id="icone_photos">photo_library</i>
                    <p class="nom photos" id="nom_photos">Photos</p>
                </a>
            </div>
            <div class="item">
                <a href="videos">
                    <i class="icone material-icons videos" id="icone_videos">video_library</i>
                    <p class="nom videos" id="nom_videos">Vidéos</p>
                </a>
            </div>
            <div class="item">
                <a href="anecdotes">
                    <i class="icone material-icons anecdotes" id="icone_anecdotes">chat</i>
                    <p class="nom anecdotes" id="nom_anecdotes">Anecdotes</p>
                </a>
            </div>
            <div class="item">
                <a href="moments">
                    <i class="icone material-icons moments" id="icone_moments">save</i>
                    <p class="nom moments" id="nom_moments">Moments</p>
                </a>
            </div>
        </div>
    </div>
</div> <!--FIN DE WRAPPER-->
    
<script src="js/script.js"></script>
    
</body>
</html>