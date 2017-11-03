//quand le document a fini de charger
window.addEventListener('load', function() {
    
    //on surveille les nouveaux messages
    raffraichissement() ;
    
    //eventlistener sur le changement de salon
    changeSalon() ;
    
    //eventlistener sur l'envoi de nouveaux messages
    requeteAjaxPosterMessage() ;
    
});


/********************  BIBLIOTHEQUE DE FONCTIONS  ***********************/


//Rafraichissement de la liste des messages
function raffraichissement() {
    setInterval(requeteAjaxRecupMessages, 2000);
    setInterval(requeteAjaxquiEstConnecte, 4000) ;
}


//Récupération des nouveaux messages et affichage
function requeteAjaxRecupMessages() {
    let idSalon = document.getElementById('idSalon').value ;
    
    ajaxMultisurfaces({
        method: 'POST',
        url: 'recupMessages.php',
        args: "salon="+idSalon,
        callback: function(response) {
            let listeMessages = document.getElementById('liste-messages') ;
            let tableauMsg = JSON.parse(response) ;
            for(let msg of tableauMsg) {
                let citation = new Message(msg.id, msg.auteur, msg.alias, msg.date_post, msg.message) ;
                let newMsg = citation.afficheMessage() ;
                listeMessages.appendChild(newMsg);
                listeMessages.appendChild(document.createElement("hr"));
                autoScrollToBottom(listeMessages) ;
            }
        }
    });
    console.log('Minitchat, va chercher !') ;
}

//ajout de nouveau message dans la BDD via envoi AJAX
function requeteAjaxPosterMessage() {
    let btnPosterMsg = document.getElementById('btnPosterMsg');

    btnPosterMsg.addEventListener('click', function(e) {
        e.preventDefault() ;

        let alias = document.getElementById('userAlias').value ;
        let msg = document.getElementById('userMessage').value ;
        let idSalon = document.getElementById('idSalon').value ;

        let newMsg= {
            "alias" : alias, 
            "msg" : msg,
            "idSalon" : idSalon 
        };

        newJSONmsg = JSON.stringify(newMsg) ;

        console.log(newJSONmsg) ;
        //on fait une requête ajax pour envoyer newJSONmsg en $_POST['message']
        let requeteAjaxSendMessage = ajaxMultisurfaces({
            method: 'POST',
            url: 'addMessage.php',
            args: "message="+newJSONmsg,
            callback: function(response) {
                //rafraichissement de liste des messages
                requeteAjaxRecupMessages() ;
                document.getElementById('userMessage').value = "" ;
            }
        });
    }) ;
}


//changement de salon
function changeSalon() {
    let menuSalons = document.getElementById('menuSalon');
    
    menuSalons.addEventListener('change', function() {
        //redirection mais voir comment transférer le pseudo et le numéro de salon
        //document.location.href="nouvellepage.html"
        console.log("Pouic, je change !") ;
    }) ;
}


//descente automatique du salon de discussion


function autoScrollToBottom(listeMessages) {
    listeMessages.scrollIntoView(false);
}


//actualisation de la liste des personnes conenctées

function requeteAjaxquiEstConnecte() {

    let idSalon = document.getElementById('idSalon').value ;
    
    ajaxMultisurfaces({
        method: 'POST',
        url: 'recupConnectes.php',
        args: "salon="+idSalon,
        callback: function(response) {
            //j'ai récupéré la réponse, je vide la zone et je refais la liste
            let listingEnLigne = document.getElementById('listingEnLigne') ;
            
            listingEnLigne.textContent = "" ;
            
            let tableauOnline =  JSON.parse(response) ;
            
            for(let personne of tableauOnline) {
                let elementListe = document.createElement("li") ;
                elementListe.textContent = personne ;
                listingEnLigne.appendChild(elementListe);
                console.log('bouh !') ;
            }
        }
    });
}