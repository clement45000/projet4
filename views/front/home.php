<?php
ob_start();
?>
    <div class="container shadow p-3 mb-5 rounded border border-bg-dark bg-white  mt-5 mb-5 pl-5 pr-5">
        <div class="bg-dark text-light ">
            <h1 class="text-center mt-5 pt-5" > Les aventures de Jean forteroch en Alaska</h1>
            <p class="text-center mt-4 pb-5 ">Je vous souhaite la bienvenue</p>
        </div>
        <img class="simg" src="public/images/huit.jpg"> 
        <h2 class="text-center mt-5"> Derniers articles publiés</h2>
        <hr class="mt-5">
    <?php foreach ($lastPosts as $lastPost): ?>
                <div class="mt-5 mb-5">    
                    <h3 class="text-info"><a class=" text-decoration-none" href="?page=post&id=<?=$lastPost['id_post']?>"><?= $lastPost['title_post'] ?></a></h3>
                    <p><em>Publié le</em> <?= $lastPost['date_post'] ?></p>
                    <p class="text-muted"><?= $lastPost['content_post'] ?></p>
                    <a class="text-decoration-none" href="?page=post&id=<?=$lastPost['id_post']?>">Lire la suite</a>
                </div> 
            <hr class=" mb-4">
            <?php endforeach; ?>
        




    </div>
<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>





