<script type="text/javascript">

</script>

<!--Saisir les informations dans un formulaire!-->
<form name="formAjout" action="" method="post">
  <fieldset>
    <legend>Entrez les données sur le praticien à ajouter </legend>
    <label> Nom : </label> <input type="text" name="PRA_NOM" size="20" /><br />
    <label>Prénom :</label> <input type="text" name="PRA_PRENOM" size="20" /><br />
    <label>Adresse :</label> <input type="text" name="PRA_ADRESSE" size="20" /><br />
    <label>Téléphone :</label> <input type="text" name="PRA_TEL" size="20"/><br />    
    <label>Specialité :</label> <input type="text" name="PRA_SPECIALITE_COMP" size="20"/><br />
    <label>Département :</label> <input type="text" name="PRA_DEPARTEMENT" size="20"/><br />
    <label>Notoriete :</label> <input type="text" name="PRA_COEFNOTORIETE" size="20"/><br />

    <select name="TYPE_CODE">
       <option selected value = "MH">Médecin Hospitalier</option>
       <option value = "MV"> 	Médecine de ville</option>
       <option value = "PH"> 	Pharmacien Hospitalier</option>
       <option value = "PO"> 	Pharmacien Officine</option>
       <option value = "PS">Personnel de sante</option>
    </select> 
  </fieldset>
  <input type="submit" value = "Enregistrer" /> 
  <input type="reset" value="Annuler" /><p />
</form>
