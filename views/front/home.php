<?php
ob_start();
?>
    <div id="container_home" class="container shadow p-3 mb-5 rounded border border-bg-dark bg-white  mt-5 mb-5 pl-5 pr-5">
        <div  class="bg-dark text-light ">
            <h1 id="title_home" class="text-center mt-5 pt-5" > Les aventures de Jean Forteroch en Alaska</h1>
            <p id="welcome" class="text-center mt-4 pb-5 h3">Je vous souhaite la bienvenue</p>
        </div>
        <img id="imgheader" class="simg" src="<?= URL ?>public/images/huit.jpg" alt="photo de l'alaska"> 
        <p id="second_title" class="text-center h2 mt-5"> Derniers épisodes publiés</p>
        <hr class="mt-5">
     
    <?php foreach ($lastPosts as $lastPost): ?>
                <div class="mt-5 mb-5 text-center last_posts ">    
                    <h2 class="text-info title_post"><a class=" text-decoration-none" href="<?= URL ?>post&amp;id=<?=htmlspecialchars($lastPost['id_post'])?>"><?= htmlspecialchars($lastPost['title_post'])?></a></h2>
                    <p class="date_posthome">Publié le <?= htmlspecialchars($lastPost['date_post']) ?></p>
                                          
                    <a class="text-decoration-none" href="<?= URL ?>post&amp;id=<?=htmlspecialchars($lastPost['id_post'])?>">Lire l'article</a>
                 
                </div> 
            <hr class=" mb-4">
            <?php endforeach; ?>
        




    </div>
<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>



