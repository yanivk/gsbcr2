<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
  $repInclude = './include/';
  $repVues = './vues/';
  
 require($repInclude . "_init.inc.php");
  


/*if (count($_POST)==0)
{
  $etape = 1;
}    */
  $supr=$_GET["salut"];
  supprimer($supr, $tabErr);

  $prat="";
  $praticien = listerPraticien($prat);
  

// Construction de la page Rechercher
// pour l'affichage (appel des vues)

include($repVues."entete.php") ;
include($repVues."menu.php") ;

?> 

<div id="contenu">
<?php
include($repVues ."erreur.php");

include($repVues."vLister.php") ;

?>
</div>

<?php
include($repVues."pied.php") ;
?>
  
<?php

?>
<?php

?>
