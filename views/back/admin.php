<?php
ob_start();
?>
<a href="" class="btn btn-primary mt-5 ml-5">Deconnexion</a>
        <div class="container">
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
                    <td class="align-middle"><a href="?page=deletecomment&id=<?=$allPost['id_post']?>"><?= $allPost['title_post'] ?></a></td>
                    <td class="align-middle"><?=date("d/m/Y", strtotime($allPost['date_post']));?></td>
                    <td class="align-middle"><a href="?page=updatepost" class="btn btn-primary">Modifier</a></td>

                    <td class="align-middle">
                        <form method="POST" action="?page=deletepost&id=<?=$allPost['id_post']?>"> <!-- SUPPRIMER UN ARTICLE ET COMM-->
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a href="?page=createpost" class="btn btn-success d-block">Ajouter un article</a>
            <h2 class="mt-5">Commentaires signalés</h2>






        </div>
        <?php
$content = ob_get_clean();
require "views/commons/template.php";
?>