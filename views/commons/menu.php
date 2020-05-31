<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto pl-5">
                <li class="nav-item ">
                    <a class="nav-link text-light" href="?page=home">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light " href="?page=biographie">Biographie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light " href="?page=posts">Mes articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-light" href="?page=contact">Contact</a>
                </li>
            </ul>      
           
              <?php if(isset($_SESSION['acces']) && $_SESSION['acces'] === "1"){ ?>
                    <a href="?page=admin" class="nav-link text-light">Admin home</a>
                    <a href="?page=logout" class="nav-link text-light">Déconnexion</a>
             <?php } elseif(isset($_SESSION['acces']) && $_SESSION['acces'] === "2") { ?>
                   <a href="?page=logout" class="nav-link text-light">Déconnexion</a> 
             <?php }else{ ?>
                    <a href="?page=signup" class="nav-link text-light">Inscription</a>
                   <a href="?page=login" class="nav-link text-light">Connexion</a>
             <?php } ?>
            
        </div>

    </nav>
              
                
                
          