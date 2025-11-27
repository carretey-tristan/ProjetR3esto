<h1>Recherche d'un restaurant</h1>
<form action="./?action=recherche&critere=<?= $critere ?>" method="POST">
<?php
  $lesTypesC = getLesTypesCuisine();
switch ($critere){
   case "nom":
      echo "Recherche par nom :   ";
      echo "<input type='text' id='nom' name='nom' size='50'>";
      break;
   case "adresse":
      echo "Recherche par adresse :<br>";
      echo "<input type='text' id='ville' name='ville' size='50' placeholder='Ville'><br>";
      echo "<input type='text' id='cp' name='cp' size='50' placeholder='Code Postal'><br>";
      echo "<input type='text' id='rue' name='rue' size='50' placeholder='Rue'><br>";
      break;
   case "type":
      echo "Recherche par type de cuisine : <br>";
      
      echo "<div class='types'>";
          foreach ($lesTypesC as $unTypeC) {
              echo "<div class='type'>";
                echo "<input type='checkbox' name='tabTypesC[]' value='$unTypeC->idTC'>$unTypeC->libelleTC <br>";
                echo "</div>";
                }
      echo "</div>";
      break;
   }
?>
   <input type="submit" value="Rechercher" />
</form>