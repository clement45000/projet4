<?php
ob_start();
?>
    <div class="container">
    <h1 class="mt-5 mb-5 text-center">Bienvenue sur mon blog </h1>

    <?php foreach ($lastPosts as $lastPost): ?>
                <div class="mt-5 mb-5">    
                    <h2 class="text-info"><a class=" text-decoration-none" href=""><?= $lastPost['title_post'] ?></a></h2>
                    <p><em>Publié le</em> <?= $lastPost['date_post'] ?></p>
                    <p class="text-muted"><?= $lastPost['content_post'] ?></p>
                    <a class="text-decoration-none" href="">Lire la suite</a>
                </div> 
            <hr class="bg-dark mb-4">
            <?php endforeach; ?>
    </div>
<?php
$content = ob_get_clean();
$title = 'Accueil';
require "views/commons/template.php";
?>





