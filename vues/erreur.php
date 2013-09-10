<?php
      
if ( nbErreur($tabErreurs) > 0 ) 
{
 ?>
 <div class="container">
    <div class="alert alert-error">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Erreur !</strong> <?php echo toStringErreurs($tabErreurs);?>
    </div>
 </div>            
 <?php               
}
if ( nbErreur($tabSucces) > 0 ) 
{
 ?>
 <div class="container">
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Succes !</strong> <?php echo toStringErreurs($tabSucces);?>
    </div>
 </div>            
 <?php               
}


?>