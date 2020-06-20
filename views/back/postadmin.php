<?php
ob_start();
?>
<a href="<?= URL ?>admin" class="btn btn-primary mt-5 ml-5">Retour Accueil admin</a>
    <div id="container_adminpost" class="container ">
        <div id="testpadd" class="border border-bg-dark mt-5 mb-5 pl-5 pr-5 shadow p-3 mb-5  bg-white rounded">
            <div class="bg-dark text-light" >
                <h1 class="text-center pt-5 mt-5 mb-5"><?=htmlspecialchars($postById['title_post'])?></h1>
                <p class ="text-center mt-4 pb-5"> Publié le : <?=htmlspecialchars($postById['date_post'])?>  </p>
            </div>
        </div>
        <div class="bg-light text-muted p-2">
        <div class ="text-center text-muted mt-5 mb-5"><?=$postById['content_post']?>  </div>
                <p class ="text-center">Ecrit par : <?= htmlspecialchars($postById['author_post'])?></p>
        </div>

        <div class="mb-5 shadow p-3 mb-5">
                <p class= "text-center bg-dark text-white  pt-2 pb-2">Les commentaires</p>
            <?php foreach ($commentsById as $commentById) :?>
                <div class="text-center border border-bg-dark bg-light mt-2 pb-2">
                    <p class="mt-2 ml-2 mb-0"><strong><?=htmlspecialchars($commentById['pseudo_comment'])?></strong> à écrit le <?=htmlspecialchars($commentById['date_comment'])?></p>
                    <p class="mt-0 mb-0 ml-2"><?=htmlspecialchars($commentById['content_comment'])?></p> 
                    <form method="POST" action="deletecomment&amp;id=<?=htmlspecialchars($commentById['id_comment'])?>" onSubmit="return confirm('voulez-vous vraiment supprimer ce commentaire ?');">
                            <button class="btn btn-link mt-2" type="submit">Supprimer le commentaire</button>
                    </form>
                </div>    
            <?php endforeach; ?>  
        </div>
        <div class="shadow bg-white p-3 mb-5">
            <p class="bg-dark text-light text-center  pt-2 pb-2">Laissez un commentaire</p>
            <form class="">
                <div class="form-group col-6">
                    <label for="pseudo">Votre pseudo</label>
                    <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder= "Entrez votre pseudo..." required>
                </div>

                <div class="form-group col-12">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" placeholder= "Ecrivez votre commentaire..."  required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-5 ml-3">Envoyer votre message</button>
            </form>
        </div>
       
    </div>
 



 
<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>





