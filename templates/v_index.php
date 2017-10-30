<main>
   <form id="accesTchat" method="POST" action="tchat.php">
    
        <?php
        if(isset($user)) {
            echo 'Bienvenue '.$user->getPseudo().'<a href="deconnexion.php" title="Se déconnecter">[x]</a>,' ;
        } else {
        ?>
            <p><label for="pseudo" required>Pseudo :</label><br/>
            <input id="pseudo"  name="pseudo" type="text" maxlength="32" required /></p>

            <!--
            <p><label for="motdepasse">Mot de passe :</label><br/>
            <input id="motdepasse"  name="motdepasse" type="text" /></p>-->
        <?php
        }
        ?>
    
        <p><label for="salon">Salon de discussion :</label><br/>
            <select name="salon" id="salon">
            <?php
                $listingSalonsC = $bdd->readListeSalons() ;
                
                foreach($listingSalonsC as $objet) {
                    echo "<option value=".$objet->getIdSalon().">".$objet->getNomSalon()."</option>" ;
                }
            ?>
            </select>
        </p>
        <p><input id="btnTchat" class="btnValid" type="submit" value="Tchatter" />
        </p>
</form>

    <!--
<p id="infosAcces">Il n'est pas nécessaire d'indiquer un mot de passe. Cependant, en créant un compte ou en t'identifiant, tu pourras te réserver l'usage d'un pseudo régulier et accéder à des salons réservés.</p>
 -->
    
</main>