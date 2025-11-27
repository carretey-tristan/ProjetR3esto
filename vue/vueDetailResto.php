<h1></h1>

<h1 id="nomR">
    <?php echo $unResto->nomR;
    if (null !== getMailULoggedOn()) {
        $aimer        = getAimerById(getMailULoggedOn(), $idR);
        echo"<a href='./?action=aimer&id=$idR'>";
        if ($aimer) {
                echo "<img class='aimer' src='/resto/images/aime.png' alt='j'aime ce restaurant'>";
        } else {
                echo "<img class='aimer' src='/resto/images/aimepas.png' alt='je n'aime pas ce restaurant'>";
        }
        echo "</a>";
    }   
    ?>
</h1>

<span id="note" class='info'>
    <?php
    for ($i = 1; $i <= 5; $i++) {
        echo "<img class='note' src='images/like.png' alt=''>";
    }
    ?>
</span>

<section>
    <h2 class='info'>Type de cuisine</h2>
    <p>
        <ul >	
            <?php	
            foreach ($lesTypes as $unType) {
                echo "<li class='tag'><span class='tag'>#$unType->libelleTC</span></li>";
            }
            ?>
        </ul>
    </p>
</section>
<section >
    <h2 id="description" class='info'>Description</h2>  
    <p>
    <?php echo $unResto->descR; ?>
    </p>
</section>

<h2 id="adresse" class='info'>Adresse</h2>
    <br>
    <?php 
    echo" <href><h3>$unResto->numAdrR $unResto->voieAdrR $unResto->cpR $unResto->villeR</h3></href>"; 
    ?>
    </br>

<p>
</p>

<h2 id="photos" class='info'>Photos</h2>
    <br>
    <?php
    foreach ($lesPhotos as $unePhoto) {
        echo "<img id='photo' src='photos/$unePhoto->cheminP' alt='photo du restaurant'>";  
    }
    ?>

    </br>   

<ul id="galerie">
    <li><img class="galerie" src="" alt="" /></li>  
</ul>

<h2 id="horaires" class='info'>Horaires</h2> 
    <p>
    <?php echo $unResto->horairesR; ?>
    </p>

<p>
</p>


<h2 id="crit" class='info'>Critiques</h2>
<ul>
    <?php
    $index = 0; 
    foreach ($lesCritiques as $uneCritique) {
        $class = ($index % 2 === 0) ? 'odd' : 'even'; 
        echo "
        <div class='critique $class'>
            <li>$uneCritique->mailU</li>
            <p>
                <span class='note'>Note :</span>
                <span class='note'>$uneCritique->note</span>/5
                </br>
                <span class='note'>$uneCritique->commentaire</span>";
                if (null !== getMailULoggedOn() && getMailULoggedOn() == $uneCritique->mailU) {
                    echo "<a href='./?action=supprimer&id=$idR'> Supprimer</a>";
                    echo " | <a href='./?action=detail&id=$idR&critiquer=0'>Modifier</a>";
                }
                echo "
            </p>
        </div>
        </br>
        ";
        $index++; 
    } 
   
    if (isLoggedOn()) {
        
        if ($critique == null || (isset($_GET['critiquer']))) {
            ?>
            <form method='POST' action='./?action=detail&id=<?php echo $idR; ?>'>
            <?php
            if (isset($_GET['critiquer']) && $_GET['critiquer'] == 0) {
                // Modification d'une critique
                echo "<input type='text' name='commentaireModif' placeholder='Votre commentaire' value='" . htmlspecialchars($critique->commentaire ?? '', ENT_QUOTES, 'UTF-8') . "' required>";
            } else {
                // Ajout d'une nouvelle critique
                echo "<h2>Ajouter une critique</h2>";
                echo "<input type='text' name='commentaire' placeholder='Votre commentaire' required>";
            }
            ?>
                <div>
                    <label>
                        <input type="radio" name="note" value="1" <?php echo (isset($critique->note) && $critique->note == 1) ? 'checked' : ''; ?> required>
                        1
                    </label>
                    <label>
                        <input type="radio" name="note" value="2" <?php echo (isset($critique->note) && $critique->note == 2) ? 'checked' : ''; ?> required>
                        2
                    </label>
                    <label>
                        <input type="radio" name="note" value="3" <?php echo (isset($critique->note) && $critique->note == 3) ? 'checked' : ''; ?> required>
                        3
                    </label>
                    <label>
                        <input type="radio" name="note" value="4" <?php echo (isset($critique->note) && $critique->note == 4) ? 'checked' : ''; ?> required>
                        4
                    </label>
                    <label>
                        <input type="radio" name="note" value="5" <?php echo (isset($critique->note) && $critique->note == 5) ? 'checked' : ''; ?> required>
                        5
                    </label>
                </div>
                
                <!-- Bouton dynamique -->
                <input type="submit" value="<?php echo (isset($_GET['critiquer']) && $_GET['critiquer'] == 0) ? 'Modifier la critique' : 'Ajouter une critique'; ?>">
            </form>
        <?php }  
    } else {
        echo "<h2>Connectez-vous pour ajouter une critique</h2>";
    }
    ?>
    
    
</ul>



