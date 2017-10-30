//quand le document a fini de charger
window.addEventListener('load', function() {
    
    //on surveille les nouveaux messages
    raffraichissement() ;
    
    //eventlistener sur le changement de salon
    changeSalon() ;
    
    //eventlistener sur l'envoi de nouveaux messages
    posterMessage() ;
    
});


/********************  BIBLIOTHEQUE DE FONCTIONS  ***********************/


//Rafraichissement de la liste des messages
function raffraichissement() {
    setInterval(requeteAjaxRecupMessages, 2000);
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
            }
        }
    });
    console.log('Minitchat, va chercher !') ;
}

//ajout de nouveau message dans la BDD via envoi AJAX
function posterMessage() {
    let btnPosterMsg = document.getElementById('btnPosterMsg');

    btnPosterMsg.addEventListener('click', function(e) {
        e.preventDefault() ;

        let alias = document.getElementById('userAlias').value ;
        let msg = document.getElementById('userMessage').value ;
        let idSalon = document.getElementById('idSalon').value ;

        let newMsg= {
            "alias" : alias, 
            "msg" : msg,
            "idSalon" : "1" 
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
                /*
                //affichage de notre message
                let listeMessages = document.getElementById('liste-messages') ;
        
                let myMsg = new Message(msg.id, msg.auteur, alias, msg.date_post, msg) ;
                listeMessages.appendChild(myMsg.afficheMessage());
                listeMessages.appendChild(document.createElement("hr"));*/
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
        console.log("Pouis, je change !") ;
    }) ;
}