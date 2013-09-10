

<!-- Affichage de la partie commune du menu -->
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="./index.php">Accueil</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active">
                <a href="./index.php">Accueil</a>
              </li>
              <li class="nav"> 
                <a href="lister.php" title="Lister un praticien">Lister praticien</a>
              </li>
              <li class="nav"> 
                <a href="rechercher.php" title="Rechercher un praticien">Rechercher praticien</a>  
              </li>
  
          
          <?php 
          
$nom=lireDonneePost("VIS_NOM", "");
$mdp=lireDonneePost("VIS_MDP", "");

if (estVisiteurConnecte())
{
  ?>
  <body>
  
      <li class="nav"> 
        <a href="ajouter.php" title="Ajouter un praticien">Ajouter praticien</a>
      </li>
      <li class="nav"> 
        <a href="cSeDeconnecter.php" title="Se déconnecter">Se déconnecter</a>
      </li>
<?php
}
else
{

          
          ?> 
           <li class="nav"> 
              <a href="identifier.php" title="Se connecter">Se connecter</a>
           </li>
<?php } ?>

            </ul>           
          </div>
        </div>
      </div>
</div>