<?php
ob_start();
?>
<a href="" class="btn btn-primary mt-5 ml-5">Deconnexion</a>
        <div class="container shadow p-3 mb-5 rounded border border-bg-dark bg-white  mt-5 mb-5 pl-5 pr-5 ">
            <h1 class="text-center mt-5" > Bienvenue sur l'administration du site</h1>
            <table class="table text-center  mt-5">
            <thead class="thead-dark">
                <tr class="">
                    <th>Titre</th>
                    <th>Date de publication</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($allPosts as $allPost): ?>

                <tr>
                    <td class="align-middle"><a href="?page=postadmin&id=<?=$allPost['id_post']?>"><?= $allPost['title_post'] ?></a></td>
                    <td class="align-middle"><?=date("d/m/Y", strtotime($allPost['date_post']));?></td>
                    <td class="align-middle"><a href="?page=updatepost&id=<?=$allPost['id_post']?>" class="btn btn-primary">Modifier</a></td>
                  
                    <td class="align-middle">
                        <form method="POST" action="?page=deletepost&id=<?=$allPost['id_post']?>" onSubmit="return confirm('voulez-vous vraiment supprimer cet article ?');"> <!-- SUPPRIMER UN ARTICLE ET COMM-->
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a href="?page=createpost" class="btn btn-success d-block">Ajouter un article</a>
            <hr class='mt-5 pt-2'>
        </div>

            <!--tableau 2-->
        <div class="container shadow p-3 mb-5 rounded border border-bg-dark bg-white  mt-5 mb-5 pl-5 pr-5">
            <h2 class="text-center mt-5" >Commentaires signalés</h2>
            <table class="table text-center  mt-5">
            <thead class="thead-dark">
                <tr class="">
                    <th>Pseudo</th>
                    <th>date</th>
                    <th>Contenue du commentaire</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
     
            <?php foreach ($getcommentsreported as $getcommentreported): ?>
                <tr>
                    <td class="align-middle"><?=$getcommentreported['pseudo_comment']?></td>
                    <td class="align-middle"><?=$getcommentreported['date_comment']?></td>
                    <td class="align-middle"><?=$getcommentreported['content_comment']?></td>
                    <td class="align-middle"><a href="?page=updatepost" class="btn btn-primary">Ignorer</a></td>

                    <td class="align-middle">
                        <form method="POST" action="" onSubmit="return confirm('Voulez-vous vraiment supprimer ce commentaire ?');"> <!-- SUPPRIMER UN ARTICLE ET COMM-->
                            <button class="btn btn-danger" type="submit">Supprimer</button>
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