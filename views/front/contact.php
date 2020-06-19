<?php
ob_start();
?>


    <div id="container_contact" class="container mt-5 pl-5 pr-5 pt-5 bg-white shadow p-3 mb-5 ">
    <div id="bakcground_title" class="bg-dark text-light">   
    <h1 id="title_contact" class="text-center pt-4 pb-4 mb-5"> Contactez-moi</h1>
    </div>
    <?php if($mailerror !== ""){ ?><div class="alert alert-danger text-center" role="alert"><?= htmlspecialchars($mailerror)?></div><?php } ?>
    <?php if($mailvalid !== ""){ ?><div class="alert alert-success text-center" role="alert"><?= htmlspecialchars($mailvalid)?></div><?php } ?>
            <form action="contact" method="post">
            <div class="form-group">
                    <label for="objet">Objet</label>
                    <?php if($unvalidObjet !== ""){ ?><span class="text-danger"><?= htmlspecialchars($unvalidObjet)?></span><?php } ?>
                    <input type="text" name="objet" id="objet" class="form-control" placeholder= "objet du message" value='<?php if(isset($objet)) echo $objet;?>' >
                </div>

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <?php if($unvalidfirstname !== ""){ ?><span class="text-danger"><?= htmlspecialchars($unvalidfirstname )?></span><?php } ?>
                    <input type="text" name="nom" id="nom" class="form-control" placeholder= "nom" value='<?php if(isset($nom)) echo $nom;?>'>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <?php if($unvalidname  !== ""){ ?><span class="text-danger"><?= htmlspecialchars($unvalidname )?></span><?php } ?>
                    <input type="text" name="prenom" id="prenom" class="form-control" placeholder= "prenom" value='<?php if(isset($prenom)) echo $prenom;?>'>
                </div>
                <div class="form-group">
                    <label for="mail">Email</label>
                    <?php if($unvalidmail !== ""){ ?><span class="text-danger"><?= htmlspecialchars($unvalidmail)?></span><?php } ?>
                    <input type="text" name="mail" id="mail" class="form-control" placeholder= "nom@exemple.com" value='<?php if(isset($mail)) echo $mail;?>'>
                </div>
               
                <div class="form-group">
                    <label for="message">Message</label>
                    <?php if($unvalidmessage !== ""){ ?><span class="text-danger"><?= htmlspecialchars($unvalidmessage)?></span><?php } ?>
                    <textarea class="form-control" id="message" name="message"><?php if(isset($message)) echo $message;?></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-5">Envoyer votre message</button>
            </form>
    
    </div>

<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>