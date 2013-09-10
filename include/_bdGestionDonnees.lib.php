<?php

// MODIFs A FAIRE
// Ajouter en têtes 
// Voir : jeu de caractères à la connection

/** 
 * Se connecte au serveur de données MySql.                      
 * Se connecte au serveur de données MySql à partir de valeurs
 * prédéfinies de connexion (hôte, compte utilisateur et mot de passe). 
 * Retourne l'identifiant de connexion si succès obtenu, le booléen false 
 * si problème de connexion.
 * @return resource identifiant de connexion
 */
function connecterServeurBD() {
    $hote = "localhost";
    $login = "root";
    $mdp = "";
    return mysql_connect($hote, $login, $mdp);
}

/**
 * Sélectionne (rend active) la base de données.
 * Sélectionne (rend active) la BD prédéfinie gsb_frais sur la connexion
 * identifiée par $idCnx. Retourne true si succès, false sinon.
 * @param resource $idCnx identifiant de connexion
 * @return boolean succès ou échec de sélection BD 
 */
function activerBD($idCnx) {
    $bd = "gsbcrstat";
    $query = "SET CHARACTER SET utf8";
    // Modification du jeu de caractères de la connexion
    // $res = mysql_query($query, $idCnx); 
    $ok = mysql_select_db($bd, $idCnx);
    return $ok;
}

/** 
 * Ferme la connexion au serveur de données.
 * Ferme la connexion au serveur de données identifiée par l'identifiant de 
 * connexion $idCnx.
 * @param resource $idCnx identifiant de connexion
 * @return void  
 */

function connecter($nom,$mdp) {
    
// Connexion au serveur Mysql
$connexion = mysql_connect("localhost","root","");

// Si la connexion a réussi
if ($connexion) 
{
    // Sélection de la base de donnée
    mysql_select_db("gsbcrstat",$connexion);
    
    // Fabrication de la requête de recherche
    $requete="select * from visiteur where VIS_NOM ='".$nom."' and VIS_MDP ='".$mdp."' ;";
    //echo $requete;
    // Lancement de la requête
    $resultat= mysql_query($requete,$connexion);
    
    // Lire la première ligne de résultat
    $ligne=mysql_fetch_assoc($resultat);
    //echo "test", $ligne[0], " fin";
    if ($ligne)
    {
       // Connexion réussie
        affecterInfosConnecte($ligne["VIS_NOM"], $ligne["VIS_MDP"]);
        $message= "Identification réussie!";
        //echo "test connection reussie";
    
    }

    mysql_close($connexion);
}
else
{
    $message = "Problème à la connexion !";
}


}


function ajouterPraticien($unNom, $unPrenom, $uneAdresse, $uneTel, $uneSpe, $unDepartement, $uneNotoriete, $unType, &$tabErr)
  {
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $idConnexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if ($idConnexion) 
  {
    // sélectionner la base de donnée
    activerBD($idConnexion);
    
    // Vérifier que la référence saisie n'existe pas déja
    $requete="select * from praticien";
    $requete=$requete." where PRA_NOM = '".$unNom."';"; 
    $jeuResultat=mysql_query($requete,$idConnexion);
    $ligne=mysql_fetch_assoc($jeuResultat);
    echo"test",$requete;
    if($ligne)
    {
      $message="Echec de l'ajout : le praticien existe déjà !";
      ajouterErreur($tabErr, $message);
 
    }
    else
    {
      // Créer la requête d'ajout 
       $requete="insert into praticien"
       ."(PRA_NOM, PRA_PRENOM, PRA_ADRESSE, PRA_TEL, PRA_SPECIALITE_COMP, PRA_DEPARTEMENT, PRA_COEFNOTORIETE, TYP_CODE) values ('"
        
       .$unNom."','"
       .$unPrenom."','"
       .$uneAdresse."','"
       .$uneTel."','"
       .$uneSpe."','"
       .$unDepartement."','"
       .$uneNotoriete."','"
       .$unType."');";
        // Lancer la requête d'ajout 
        $ok= mysql_query($requete,$idConnexion);
        
        // Si la requête a réussi
        if ($ok)
        {
        
          $message = "Le praticien a été correctement ajoutée";
          ajouterErreur($tabErr, $message);
          echo "test",$message;
        }
        else
        {
          $message = "Attention, l'ajout du praticien a échoué !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
   
  }
  else
  {
    $message = "problème à la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}

function supprimer($ref,&$tabErr)
{
  $idConnexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if ($idConnexion) 
  {
    // sélectionner la base de donnée
    activerBD($idConnexion);
   
    // Vérifier que la référence existe
     $requete="select * from praticien";
    $requete=$requete." where PRA_NOM = '".$unNom."';"; 
    $jeuResultat=mysql_query($requete,$idConnexion);
    $nb_lignes=mysql_num_rows($jeuResultat);
    
    // Si la référence n'existe pa, la supression n'est pas possible
    if($nb_lignes==0)
    {
      $message= "Echec de la suppression : le praticien n'existe pas !";
      ajouterErreur($tabErr, $message);
    }    
    else
    {
       // Créer la requête de suppression 
       $requete ="delete from produit where pdt_ref='".$_POST["ref"]."';";  
   
      // Lancer la requête de suppression 
      $ok= mysql_query($requete,$idConnexion);
      
      // Si la requête a réussi
      if ($ok)
      {
        $message= "La fleur a bien été supprimée";
         ajouterErreur($tabErr, $message);
       }
      else
      {
        $message= "Attention, la suppression de la fleur a échoué !";
        ajouterErreur($tabErr, $message);
      }

    }
    // fermer la connexion
    deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "problème à la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}


function rechercher($description)
{

  $idConnexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if ($idConnexion) 
  {
    // sélectionner la base de donnée
    activerBD($idConnexion);
         
    $requete="select * from praticien";
    $requete=$requete." where PRA_NUM like '%".$description."%'
                        or PRA_NOM like '%".$description."%'
                        or PRA_PRENOM like '%".$description."%'
                        or PRA_ADRESSE like '%".$description."%'
                        or PRA_TEL like '%".$description."%'
                        or PRA_SPECIALITE_COMP like '%".$description."%'
                        or PRA_DEPARTEMENT like '%".$description."%'
                        or PRA_COEFNOTORIETE like '%".$description."%'
                        or TYP_CODE like '%".$description."%';"; 
    $jeuResultat=mysql_query($requete,$idConnexion);
    $ligne=mysql_fetch_assoc($jeuResultat);
    $i = 0;
    while($ligne)
    {
          $praticien[$i]['numero']=$ligne["PRA_NUM"];
          $praticien[$i]['nom']=$ligne["PRA_NOM"];
          $praticien[$i]['prenom']=$ligne["PRA_PRENOM"];
          $praticien[$i]['adresse']=$ligne["PRA_ADRESSE"];
          $praticien[$i]['Telephone']=$ligne["PRA_TEL"];
          $praticien[$i]['Specialite']=$ligne["PRA_SPECIALITE_COMP"];
          $praticien[$i]['departement']=$ligne["PRA_DEPARTEMENT"];
          $praticien[$i]['coefficient']=$ligne["PRA_COEFNOTORIETE"];
          $praticien[$i]['type']=$ligne["TYP_CODE"];
        $ligne=mysql_fetch_assoc($jeuResultat);
        $i = $i + 1;
        
    }
  }
  //deconnecterServeurBD($idConnexion);
  return $praticien;
}

function modifier($unNum, $unNom, $unPrenom, $uneAdresse, $uneTel, $uneSpe, $unDepartement, $uneNotoriete, $unType, $tabErreurs) {

// Ouvrir une connexion au serveur mysql en s'identifiant
$connexion = mysql_connect("localhost","root","");

// Si la connexion au SGBD à réussi
if ($connexion) 
{
  // sélectionner la base de donnée
  mysql_select_db("gsbcrstat",$connexion);
  
 // Créer la requête de modification
  $requete="insert into produit"
 ."(PRA_NUM, PRA_NOM, PRA_PRENOM, PRA_ADRESSE, PRA_TEL, PRA_SPECIALITE_COMP, PRA_DEPARTEMENT, PRA_COEFNOTORIETE, TYP_CODE) values ('"
  .$unNum."','"
  .$unNom."','"
  .$unPrenom."','"
  .$uneAdresse."','"
  .$uneTel."','"
  .$uneSpe."','"
  .$unDepartement."','"
  .$uneNotoriete."','"
  .$unType."');";
 
  $requete ="update praticien set PRA_NOM ='".$_POST["PRA_NOM"].
    "',PRA_PRENOM='".$_POST["PRA_PRENOM"].
    "',PRA_ADRESSE='".$_POST["PRA_ADRESSE"].
    "',PRA_TEL='".$_POST["PRA_TEL"].
    "',PRA_SPECIALITE_COMP='".$_POST["PRA_SPECIALITE_COMP"].
    "',PRA_DEPARTEMENT='".$_POST["PRA_DEPARTEMENT"].
    "',PRA_COEFNOTORIETE='".$_POST["PRA_COEFNOTORIETE"].
    "',TYP_CODE='".$_POST["TYP_CODE"].
    "' where PRA_NUM='".$unNum."';";
    echo $requete;
  // Lancer la requête
  $ok= mysql_query($requete,$connexion);
  
  // Si la requête a réussi
  if ($ok)
  {
    $message= "Le praticien a bien été modifié.";
  }
  else
  {
    $message= "Attention, la modification du praticien a échoué !!!";
  }
}
else
{
  $message= "problème à la connexion <br />";
}

}     

function listerPraticien($categ)
{
  $idConnexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if ($idConnexion) 
  {
      // sélectionner la base de donnée
      activerBD($idConnexion);
           
      $requete="select * from praticien order PRA_NUM";
      $jeuResultat=mysql_query($requete,$idConnexion);
      $ligne=mysql_fetch_assoc($jeuResultat);
      $i = 0;
      while($ligne)
      {
          $praticien[$i]['numero']=$ligne["PRA_NUM"];
          $praticien[$i]['nom']=$ligne["PRA_NOM"];
          $praticien[$i]['prenom']=$ligne["PRA_PRENOM"];
          $praticien[$i]['adresse']=$ligne["PRA_ADRESSE"];
          $praticien[$i]['Telephone']=$ligne["PRA_TEL"];
          $praticien[$i]['Specialite']=$ligne["PRA_SPECIALITE_COMP"];
          $praticien[$i]['departement']=$ligne["PRA_DEPARTEMENT"];
          $praticien[$i]['coefficient']=$ligne["PRA_COEFNOTORIETE"];
          $praticien[$i]['type']=$ligne["TYP_CODE"];
          $ligne=mysql_fetch_assoc($jeuResultat);
          $i = $i + 1;
      }
  }
  //deconnecterServeurBD($idConnexion); */
  return $praticien;
 
}

function listerModifier($unNum)
{
  $idConnexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if ($idConnexion) 
  {
      // sélectionner la base de donnée
      activerBD($idConnexion);
           
      $requete="select * from praticien where PRA_NUM='".$unNum."'";
      $jeuResultat=mysql_query($requete,$idConnexion);
      $ligne=mysql_fetch_assoc($jeuResultat);
      $i = 0;
      while($ligne)
      {
          $praticien[$i]['numero']=$ligne["PRA_NUM"];
          $praticien[$i]['nom']=$ligne["PRA_NOM"];
          $praticien[$i]['prenom']=$ligne["PRA_PRENOM"];
          $praticien[$i]['adresse']=$ligne["PRA_ADRESSE"];
          $praticien[$i]['Telephone']=$ligne["PRA_TEL"];
          $praticien[$i]['Specialite']=$ligne["PRA_SPECIALITE_COMP"];
          $praticien[$i]['departement']=$ligne["PRA_DEPARTEMENT"];
          $praticien[$i]['coefficient']=$ligne["PRA_COEFNOTORIETE"];
          $praticien[$i]['type']=$ligne["TYP_CODE"];
          $ligne=mysql_fetch_assoc($jeuResultat);
          $i = $i + 1;
      }
  }
  /*deconnecterServeurBD($idConnexion); */
  return $praticien;
 
}

?>
