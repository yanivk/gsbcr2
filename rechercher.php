<?php

  $repInclude = './include/';
  $repVues = './vues/';
  
require($repInclude . "_init.inc.php");
  
//$description=lireDonneePost("description", "");

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  $praticien = $pdo->getPraticienDes($_POST['description']);

}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)

include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues."vRechercherForm.php") ;

?> 

<div id="contenu">
<?php
include($repVues ."erreur.php");
//echo "etape ".$etape;
if ($etape==2)
{
  include($repVues."vLister.php") ;
}

?>
</div>

<?php
include($repVues."pied.php") ;
?>
