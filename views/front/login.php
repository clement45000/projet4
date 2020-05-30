<?php
ob_start();
?>


<div class="container  shadow p-3 mb-5 mt-5 pl-5 pr-5 pt-5 pb-5 bg-white ">
    <div class="bg-dark text-light">     
    <h1 class="text-center pt-4 pb-4 mb-5"> Connectez-vous</h1>
    </div>
    <?php if($errors !== ""){ ?>
        <div class="alert alert-danger text-center" role="alert">
         <?= $errors?>
        </div>
        <?php } ?>

        <form action="?page=login" method="post">
            <div class="form-group">
                <label for="pseudo">Username</label>
                <input type="text" name="pseudo" id="pseudo"  class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" placeholder= "mot de passe">
            </div>
            <button type="submit" class="btn btn-primary">Connexion</button>
            </form>
    </div>


<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>