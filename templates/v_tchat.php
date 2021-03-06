<main id="tchat">
    <header>
        <div id=""><a href="index.php" title="retour à l'accueil du site"><img class="icon" src="static/img/home.svg" alt="icone maison"/></a></div>
        <h2>#<?php echo $salon->getNomSalon() ;?> <button id="btnListeUsers" type="button"><img class="icon" src="static/img/users.svg" alt="icone liste utilisateurs"/></button></h2>  
        
        <form id="accesSalon" method="POST" action="tchat.php">
            <select name="salon" id="menuSalon">
                <?php
                    $listingSalons = $bdd->readListeSalons() ;
                    foreach($listingSalons as $objet) {
                        echo "<option value=".$objet->getIdSalon().">".$objet->getNomSalon()."</option>" ;
                    }
                ?>
            </select>
            <!--<input id="btnTchat" type="button" value="+" />-->
        </form>
    </header>

    
    <form id="form-user">
        <span id="chmpAlias"><label for="userAlias">Alias :</label>
            <input id="userAlias" name="userAlias" type="text" value="<?php echo $user->getPseudo() ; ?>"/></span>
        <span id="chmpMessage"><label for="userMessage">Message :</label>
            <input id="userMessage" name="userMessage" type="text" /></span>
            <input id="idSalon" type="hidden" value="<?php echo $salon->getIdSalon() ; ?>"/>
        <input id="btnPosterMsg" class="btnValid" type="submit" value="Poster" />
    </form>
    
    
    <section>
        <div id="liste-messages">
            <p><em>Vous entrez dans le salon.</em></p>
        </div>
        <aside>
            <h3>Membres connectés</h3>
            <ul id="listingEnLigne">
            <?php
                $listePseudos = $bdd->readListeConnectes($salon->getIdSalon()) ;
                foreach($listePseudos as $pseudo) {
                    echo "<li>".$pseudo."</li>" ;
                }
                
            ?>
            </ul>
        </aside>
    </section>
</main>

