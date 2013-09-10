<?php

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

if ($unNom!="")
{
  // Rechercher le praticien correspondant au nom saisie
  $praticien=$pdo->getPraticienReference($unNom);
  
  // Si le praticien à modifier a été trouvée
  if (count($praticien)>1)
  {
    $etape = 2;
  }
  else
  {
    $message="Echec de la modification : la référence n'a pas été trouvée !";
    ajouterErreur($tabErreurs, $message); 
    $etape = 1;
  }
}

if ($unNom!="")
{
    $etape = 3;
    $praticien=$pdo->modifier($unNum,$unNom,$unPrenom,$uneAdresse,$uneTel,$uneSpe,$unDepartement,$uneNotoriete,$unType,$tabErreurs,$tabSucces);
    print_r($tabSucces);
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
include($repVues."vModifierForm.php") ;


?>
</div>

<?php
include($repVues."pied.php") ;
?>