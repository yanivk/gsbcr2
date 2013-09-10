<?php
/** 
 * Initialise les ressources nécessaires au fonctionnement de l'application
 * @package default
 * @todo  RAS
 */
require ('class_PdoGSB.php');
$pdo = PdoGsb::getPdoGsb();
  
  require("_gestionSession.lib.php");
  require("_utilitairesEtGestionErreurs.lib.php");
  
  // démarrage ou reprise de la session
  initSession();
  
  // initialement, aucune erreur ...
  $tabErreurs = array();
  // ni succès ...
  $tabSucces = array();
    
?>
