<?php
ob_start();
?>
    <div class="container shadow p-3 mb-5 rounded border border-bg-dark bg-white  mt-5 mb-5 pl-5 pr-5">
        <div class="bg-dark text-light ">
            <h1 class="text-center mt-5 pt-5" >Retrouvez tout mes articles</h1>
            <p class="text-center mt-4 pb-5 ">Je vous souhaite une bonne lecture</p>
        </div>
        <img class="simg" src="public/images/un.jpg"> 
        <h2 class="text-center mt-5">Retrouvez tout mes articles sur l'Alaska</h2>
        <hr class="mt-5">
        <?php foreach ($allPosts as $allPost): ?>
                <div class="mt-5 mb-5">    
                <h3 class="text-info"><a class=" text-decoration-none" href="?page=post&id=<?=$allPost['id_post']?>"><?= $allPost['title_post'] ?></a></h3>  
               <p> <?=$allPost['date_post']?> </p>
                <?=$allPost['content_post']?> 
                </div> 
            <?php endforeach; ?>

    </div>
<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>