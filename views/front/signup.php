<?php
ob_start();
?>
 
    <div id="container_signup" class="container  shadow p-3 mb-5 mt-5 pl-5 pr-5 pt-5 pb-5 bg-white ">
        <div class="bg-dark text-light">
            <h1 id="title_signup" class="text-center pt-4 pb-4 mb-5 "> Inscrivez-vous</h1>
           
    
    <?php if($validate !== ""){ ?><div class="alert alert-success text-center" role="alert"><?= htmlspecialchars($validate)?></div><?php } ?>


     


        </div>
            <form action="signup" method="post" >
                <div class="form-group">
                    <label for="nom">Pseusdo</label> 
                    <?php if($pseudoinvalide !== ""){ ?><span class="text-danger"><?= htmlspecialchars($pseudoinvalide)?></span><?php } ?>
                    <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder= "Entrez un pseudo" value='<?=htmlspecialchars($pseudovalue)?>'>
                </div>

                <div class="form-group">
                    <label for="mail">Email</label> <?php if($mailuse !== ""){ ?><span class="text-danger"><?= htmlspecialchars($mailuse)?></span><?php } ?>
                    <input type="email" name="mail" id="mail" class="form-control" placeholder= "nom@exemple.com" value='<?=htmlspecialchars($mailvalue)?>'>
                </div> 


                <div class="form-group">
                    <label for="password">Mot de passe</label> <?php if($mdpinvalid !== ""){ ?><span class="text-danger"><?= htmlspecialchars($mdpinvalid)?></span><?php } ?>
                    <input type="password" name="password" id="password" class="form-control" placeholder= "Entrez votre de passe">
                </div> 

                 <div class="form-group">
                    <label for="passwordconfirm">Confirmation du mot de passe</label>
                    <?php if($mdpinvalid !== ""){ ?><span class="text-danger"><?= htmlspecialchars($mdpinvalid)?></span><?php } ?>
                    <input type="password" name="passwordconfirm" id="password" class="form-control" placeholder= "Confirmez votre mot de passe">
                </div>  

                <button type="submit" class="btn btn-primary ">Valider</button>
            </form>
        </div>
<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>