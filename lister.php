<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
  $repInclude = './include/';
  $repVues = './vues/';
  
 require($repInclude . "_init.inc.php");
  
$prat="";
  if (isset($_GET['PRA_NUM']))
  {
    $prat = $_GET['PRA_NUM'];
  }  
  $praticien = $pdo->getListePraticiens($prat);


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
