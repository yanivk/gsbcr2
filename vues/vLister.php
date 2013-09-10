<div class="container">
    <table class="table table-bordered table-striped table-condensed">
        <thead>
            <tr>
            <th>Num</th> <th>Nom</th> <th>Prenom</th> <th>Adresse</th> <th>Tel</th> <th>Specialite</th> <th>Departement</th>  <th>Notoriete</th> <th>Type</th> <th>Modifier</th>
            </tr>
        </thead>
            <tbody>
            <?php
            $i=0;
              while($i < count($praticien))
              {
                    echo '<tr>';
                    echo '<td align="center">'.$praticien[$i]['PRA_NUM'].'</td>';
                    echo '<td>'.$praticien[$i]['PRA_NOM'].'</td>';
                    echo '<td>'.$praticien[$i]['PRA_PRENOM'].'</td>';
                    echo '<td>'.$praticien[$i]['PRA_ADRESSE'].'</td>';
                    echo '<td>'.$praticien[$i]['PRA_TEL'].'</td>';
                    echo '<td>'.$praticien[$i]['PRA_SPECIALITE_COMP'].'</td>';
                    echo '<td>'.$praticien[$i]['PRA_DEPARTEMENT'].'</td>';
                    echo '<td>'.$praticien[$i]['PRA_COEFNOTORIETE'].'</td>';
                    echo '<td align="right">'.$praticien[$i]['TYP_CODE'].' </td>';
                    ?>
                    <td> <a href="modifier.php?num='salut'"> Modifier </a> </td>
                    <?php
                    echo '</tr>';
                    $i = $i + 1;
              }?>
              
            </tbody>
    </table>
</div>