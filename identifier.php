<?php

  $repInclude = './include/';
  $repVues = './vues/';
  
require($repInclude . "_init.inc.php");
  
$unNom=lireDonneePost("VIS_NOM", "");
$unMdp=lireDonneePost("VIS_MDP", "");

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  // Identifier l'utilisateur
  $lgUser = $pdo->identifier($unNom, $unMdp, $tabErreurs);
  
  // Si l'identification est réussie (les informations utilisateur sont fournies 
  // sous forme de tableau)
  if ($lgUser) 
  { 
      affecterInfosConnecte($lgUser["VIS_NOM"], $lgUser["VIS_MDP"]);
  }
  else 
  {
      ajouterErreur($tabErreurs, "Pseudo et/ou mot de passe incorrects");
  }
  if ( nbErreur($tabErreurs) == 0 ) 
  {
   header("Location:index.php");
  }  
}


// Construction de la page Rechercher
// pour l'affichage (appel des vues)

include($repVues."entete.php") ;
include($repVues."menu.php") ;

?> 

<div id="contenu">
<?php
include($repVues ."erreur.php");
//echo "etape ".$etape;
include($repVues."vSeConnecter.inc.php") ;


?>
</div>

<?php
include($repVues."pied.php") ;
?>