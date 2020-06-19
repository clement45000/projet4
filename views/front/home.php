<?php
ob_start();
?>
    <div id="container_home" class="container shadow p-3 mb-5 rounded border border-bg-dark bg-white  mt-5 mb-5 pl-5 pr-5">
        <div  class="bg-dark text-light ">
            <h1 id="title_home" class="text-center mt-5 pt-5" > Les aventures de Jean Forteroch en Alaska</h1>
            <p class="text-center mt-4 pb-5 ">Je vous souhaite la bienvenue</p>
        </div>
        <img id="imgheader" class="simg" src="<?= URL ?>public/images/huit.jpg"> 
        <h2 id="second_title" class="text-center mt-5"> Derniers épisodes publiés</h2>
        <hr class="mt-5">
     
    <?php foreach ($lastPosts as $lastPost): ?>
                <div id="last_posts" class="mt-5 mb-5 text-center">    
                    <h3 id="title_post" class="text-info"><a class=" text-decoration-none" href="<?= URL ?>post&id=<?=$lastPost['id_post']?>"><?= $lastPost['title_post'] ?></a></h3>
                    <p id="date_posthome">Publié le <?= $lastPost['date_post'] ?></p>
                                          
                    <a id="link_posthome" class="text-decoration-none" href="<?= URL ?>post&id=<?=$lastPost['id_post']?>">Lire l'article</a>
                 
                </div> 
            <hr class=" mb-4">
            <?php endforeach; ?>
        




    </div>
<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>



