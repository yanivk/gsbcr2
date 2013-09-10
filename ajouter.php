<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
  $repInclude = './include/';
  $repVues = './vues/';
  
 require($repInclude . "_init.inc.php");
  


$unNum=lireDonneePost("PRA_NUM", "");
$unNom=lireDonneePost("PRA_NOM", "");
$unPrenom=lireDonneePost("PRA_PRENOM", "");
$uneAdresse=lireDonneePost("PRA_ADRESSE", "");
$uneTel=lireDonneePost("PRA_TEL", "");                     
$uneSpe=lireDonneePost("PRA_SPECIALITE_COMP", ""); 
$unDepartement=lireDonneePost("PRA_DEPARTEMENT", ""); 
$uneNotoriete=lireDonneePost("PRA_COEFNOTORIETE", ""); 
$unType=lireDonneePost("TYP_CODE", ""); 


if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  ajouterPraticien($unNom, $unPrenom, $uneAdresse, $uneTel, $uneSpe, $unDepartement, $uneNotoriete, $unType, $tabErreurs);
}


// Construction de la page Rechercher
// pour l'affichage (appel des vues)

include($repVues."entete.php") ;
include($repVues."menu.php") ;

?> 

<div id="contenu">
<?php
include($repVues ."erreur.php");

include($repVues."vAjouterForm.php") ;

?>
</div>

<?php
include($repVues."pied.php") ;
?>
  
