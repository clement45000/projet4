<?php
ob_start();
?>
    <div class="container">
        <h1 class="mt-5 mb-5 text-center"><?= $postById['title_post'] ?></h1>
        <p class ="text-center"> Publié le : <?= $postById['date_post'] ?>  </p>
        <p class ="text-center"><?= $postById['content_post'] ?>  </p>
        <p class ="text-center">Ecrit par : <?= $postById['author_post'] ?>  </p>
    </div>

    <h2 class="text-center">Commentaires</h2>
    <?php foreach ($commentsById as $commentById) :?>
            <div class="text-center border border-bg-dark bg-light mt-2 pb-2">
                <p class="mt-2 ml-2 mb-0"><strong><?=$commentById['pseudo_comment'] ?></strong> à écrit le <?=$commentById['date_comment'] ?></p>
                <p class="mt-0 mb-0 ml-2"><?=$commentById['content_comment'] ?></p> 
                <a href="#" class="ml-2 pt-0">Signaler le commentaires</a>
            </div>    
                <?php endforeach; ?>  





 
<?php
$content = ob_get_clean();
$title = 'Article';
require "views/commons/template.php";
?>





