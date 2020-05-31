<?php
ob_start();
?>

    <div class="container  shadow p-3 mb-5 mt-5 pl-5 pr-5 pt-5 pb-5 bg-white ">
        <div class="bg-dark text-light">
            <h1 class="text-center pt-4 pb-4 mb-5 "> Inscrivez-vous</h1>
        </div>
            <form>
                <div class="form-group">
                    <label for="nom">Pseudo</label>
                    <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder= "pseudo" required>
                </div>
                <div class="form-group">
                    <label for="mail">Email</label>
                    <input type="email" name="mail" id="mail" class="form-control" placeholder= "nom@exemple.com" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder= "mot de passe" required>
                </div>
                <div class="form-group">
                    <label for="objet">Confirmation du mots de passe</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder= "mot de passe" required>
                </div>
                <button type="submit" class="btn btn-primary ">Valider</button>
            </form>
        </div>
<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>