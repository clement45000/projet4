<?php
ob_start();
?>


    <div id="container_contact" class="container mt-5 pl-5 pr-5 pt-5 bg-white shadow p-3 mb-5 ">
    <div id="bakcground_title" class="bg-dark text-light">   
    <h1 id="title_contact" class="text-center pt-4 pb-4 mb-5"> Contactez-moi</h1>
    </div>
    
            <form>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control" placeholder= "nom" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" placeholder= "prenom" required>
                </div>
                <div class="form-group">
                    <label for="mail">Email</label>
                    <input type="email" name="mail" id="mail" class="form-control" placeholder= "nom@exemple.com" required>
                </div>
                <div class="form-group">
                    <label for="objet">Objet</label>
                    <input type="text" name="password" id="objet" class="form-control" placeholder= "objet du message" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message"  required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-5">Envoyer votre message</button>
            </form>
    
    </div>

<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>