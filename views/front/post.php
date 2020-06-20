<?php
ob_start();
?>
 
 <?php if($validcomment !== ""){ ?><div class="alert alert-success text-center" role="alert"><?= htmlspecialchars($validcomment)?></div><?php } ?>
    <div id="container_postbyid" class="container">
        <div id="post_paddingsize" class="border border-bg-dark mt-5 mb-5 pl-5 pr-5 shadow p-3 mb-5  bg-white rounded">
            <div class="bg-dark text-light" >
                <h1 id="firsttitle_post" class="text-center pt-5 mt-5 mb-5"><?=htmlspecialchars($postById['title_post'])?></h1>
                <img id="img_post" class="simg" src="<?= URL ?>public/images/deux.jpg" alt="photo de presentation"> 
                <p class="text-center mt-4 pb-5"> Publié le : <?=htmlspecialchars($postById['date_post'])?></p>
            </div>
                <div class="text-center text-muted mt-5 mb-5"><?=($postById['content_post'])?></div>
                <p class="text-center">Ecrit par : <?=htmlspecialchars($postById['author_post'])?></p>
        </div>

        <div class="mb-5 shadow p-3 mb-5">
                <p class= "text-center bg-dark text-white  pt-2 pb-2">Les commentaires</p>
            <?php foreach ($commentsById as $commentById) :?>

                <div class="text-center border border-bg-dark bg-light mt-2 pb-2">
                    <p class="mt-2 ml-2 mb-0"><strong><?=htmlspecialchars($commentById['pseudo_comment'])?></strong> à écrit le <?=htmlspecialchars($commentById['date_comment'])?></p>
                    <p class="mt-0 mb-0 ml-2"><?=htmlspecialchars($commentById['content_comment'])?></p> 
                    <?php if(isset($_SESSION['acces']) && $_SESSION['acces'] === "2"){ ?>
                    
                    <form method="POST" action="reportcomment&amp;id=<?=htmlspecialchars($commentById['id_comment'])?>" onSubmit="return confirm ('voulez-vous vraiment signaler ce commentaire ?');">
                            <button class="btn btn-link" type="submit">signaler le commentaire</button>
                    </form>
                    <?php } ?>   
                   
                </div>    
            <?php endforeach; ?>  
        </div>
    <?php if(isset($_SESSION['acces']) && $_SESSION['acces'] === "2" || isset($_SESSION['acces']) && $_SESSION['acces'] === "1" ){ ?>
        <div class="shadow bg-white p-3 mb-5">
            <p class="bg-dark text-light text-center  pt-2 pb-2">Laissez un commentaire</p>  
    <?php if($invalid !== ""){ ?><div class="alert alert-danger text-center" role="alert"><?= htmlspecialchars($invalid)?></div><?php } ?>

 

            <form class="" id="test" action="comment&amp;id=<?=htmlspecialchars($postById['id_post'])?>" method="post">
                <div class="form-group col-6">
                    <label for="pseudo">Votre pseudo</label>
                    <input type="text" name="pseudo" id="pseudo" class="form-control"  placeholder= "Pseudo..." value="<?=htmlspecialchars($pseudoform)?>">
                </div>
                <div class="form-group col-12">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="content" placeholder= "Ecrivez votre commentaire..." ></textarea>
                </div>
                    <input type="hidden" name="flag" id="flag" value="0">
                    <input type="hidden" name="idpost" id="idpost" value="<?=htmlspecialchars($postById['id_post'])?>" >
                <button type="submit" class="btn btn-primary mb-5 ml-3">Envoyer votre message</button>
            </form>
        </div>
    <?php }else{ ?>
        <div class="border border-bg-dark bg-light mt-2 mb-5 pt-2 text-center">
            <p>Vous devez être connecté pour rédiger un un commentaire. <a href="<?= URL ?>login">Se connecter</a> ou  <a href="<?= URL ?>signup">S'inscrire</a>.</p>
        </div>
    <?php } ?>

    </div>
   



 
<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>




