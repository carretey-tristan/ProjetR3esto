<h1>Liste des restaurants</h1>
<?php
    foreach ($lesRestos as $unResto) {
        $unePhotos = getLaPhotosByIdR($unResto->idR);
        $lesTypes  = getLesTypesCuisinebyIdR($unResto->idR);
        echo "<a href='./?action=detail&id=$unResto->idR'><div class='card'>
                <div class='photoCard'>
                    <img src='photos/$unePhotos->cheminP' alt='photo du restaurant'/>
                </div>
                 $unResto->nomR
                 </br>
                 </br>
                 $unResto->numAdrR $unResto->voieAdrR $unResto->cpR $unResto->villeR
                 <div class='tagCard'>
                    <ul id='tagFood'>";
                    foreach ($lesTypes as $unType) {
                        echo "<li class='tag'><span class='tag'>#$unType->libelleTC</span></li>";
                    }
                    echo "</ul>
                </div>
            </div>
            </a>";
    }

?>