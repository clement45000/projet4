<?php
ob_start();
?>
        <div class="container shadow p-3 mb-5 rounded border border-bg-dark bg-white  mt-5 mb-5 pl-5 pr-5 ">
            <p class="text-center mt-3 h1" id="first_title" > Bienvenue sur l'administration du site</p>
        </div>
        <div id="container_firstarray" class="container shadow p-3 mb-5 rounded border border-bg-dark bg-white  mt-5 mb-5 pl-5 pr-5 " >
            <p id="gestion_post" class="text-center mt-5 h2" > Gestion des articles</p>
            <table id="first_array" class="table text-center  mt-5">
            <thead class="thead-dark">
                <tr class="" id="test">
                    <th>Titre</th>
                    <th id="datepost">Date de publication</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($allPosts as $allPost): ?>

                <tr>
                    <td class="align-middle"><a href="<?= URL ?>postadmin&id=<?=htmlspecialchars($allPost['id_post'])?>"><?=htmlspecialchars($allPost['title_post']) ?></a></td>
                    <td class="align-middle" id="date"><?=htmlspecialchars($allPost['date_post'])?></td>
                    <td class="align-middle"><a href="<?= URL ?>updatepost&id=<?=htmlspecialchars($allPost['id_post'])?>" class="btn btn-primary" id="link_update">Modifier</a></td>
                  
                    <td class="align-middle">
                        <form method="POST" action="deletepost&id=<?=htmlspecialchars($allPost['id_post'])?>" onSubmit="return confirm('voulez-vous vraiment supprimer cet article ?');"> <!-- SUPPRIMER UN ARTICLE ET COMM-->
                            <button class="btn btn-danger" type="submit" id="btn_delete">Supprimer</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a href="createpost" class="btn btn-success d-block">Ajouter un article</a>
            <hr class='mt-5 pt-2'>
        </div>

        <div class="container bg-white text-center">
        <p id="gestion_bio" class="h2 text-center pt-5"> Gestion de la biographie</p>
          <a href="<?= URL ?>updatebio" class="btn btn-primary mt-4 mb-5"> Modifiez votre biographie</a>
        </div>


        <div class="container shadow p-3 mb-5 rounded border border-bg-dark bg-white  mt-5 mb-5 pl-5 pr-5" id="container_secondarray">
            <p class="text-center mt-5 h2" id="second_title" >Commentaires signalés</p>
            <table class="table text-center  mt-5">
            <thead class="thead-dark">
                <tr class="">
                    <th id="title_comarray">Pseudo</th>
                    <th id="datecommentaire">date</th>
                    <th>Commentaire</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
     
            <?php foreach ($getcommentsreported as $getcommentreported): ?>
                <tr>
                    <td class="align-middle" id="pseudo_arraycontent"><?=htmlspecialchars($getcommentreported['pseudo_comment'])?></td>
                    <td class="align-middle" id="datecommentaire"><?=htmlspecialchars($getcommentreported['date_comment'])?></td>
                    <td class="align-middle"><?=htmlspecialchars($getcommentreported['content_comment'])?></td>
                    <td class="align-middle">
                    <form method="POST" action="ignorecomment&comment=<?=htmlspecialchars($getcommentreported['id_comment'])?>" onSubmit="return confirm('voulez-vous vraiment ignorer ce commentaire ?');"> 
                            <button id="ignore_com" class="btn btn-success text-light" type="submit">Ignorer</button>
                    </form>
                    </td>
                    <td class="align-middle">
                        <form method="POST" action="deletecommentreported&comment=<?=htmlspecialchars($getcommentreported['id_comment'])?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le commentaire ?');"> 
                            <button id="delete_com" class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>



<?php 
$content = ob_get_clean();
require "views/commons/template.php";
?>