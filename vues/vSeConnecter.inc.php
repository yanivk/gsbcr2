 <h2>Identification utilisateur</h2>
 
 <form id="frmConnexion" action="" method="post">
      <div class="corpsForm">
        <input type="hidden" name="etape" id="etape" value="validerConnexion" />
      <p>
        <label for="txtLogin" accesskey="n">* Login : </label>
        <input type="text" id="VIS_NOM" name="VIS_NOM" maxlength="20" size="15" value=""/>
      </p>
      <p>
        <label for="txtMdp" accesskey="m">* Mot de passe : </label>
        <input type="password" id="VIS_MDP" name="VIS_MDP" maxlength="8" size="15" value="" />
      </p>
      </div>
      <div class="piedForm">
      <p>
        <button type="submit" id="ok" class="btn btn-primary">  Valider </button>
        <input type="reset" id="annuler" class="btn" >   </button>
      </p> 
      </div>
</form>
    </div>
