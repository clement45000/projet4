<?php
ob_start();
?>
    <div id="container_allpost" class="container shadow p-3 mb-5 rounded border border-bg-dark bg-white  mt-5 mb-5 pl-5 pr-5">
        <div class="bg-dark text-light">
            <h1 id="title_allposts" class="text-center mt-5 pt-5" >Retrouvez tout mes articles</h1>
            <p class="text-center mt-4 pb-5 ">Je vous souhaite une bonne lecture</p>
        </div>
        <img id="imgheaderallposts" class="simg" src="<?= URL ?>public/images/un.jpg" alt="image d'une montagne"> 
        <p id="secondtitle_allposts" class="text-center mt-5 h3">Mon voyage en Alaska</p>
        <hr class="mt-5">
        <?php foreach ($allPosts as $allPost): ?>
                <div  class="mt-5 mb-5 text-center lastposts_fromallposts">    
                <h2  class="text-info titlepost_fromallposts"><a class=" text-decoration-none" href="<?= URL ?>post&amp;id=<?=htmlspecialchars($allPost['id_post'])?>"><?= htmlspecialchars($allPost['title_post']) ?></a></h2>  
               <p class="date_fromallposts"> publié le : <?=htmlspecialchars($allPost['date_post'])?> </p>
                </div> 
                <hr class="mt-5">   
            <?php endforeach; ?>

    </div>
<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>