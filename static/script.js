/*  POSTAGE D'UN NOUVEAU MESSAGE  */

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
            requeteAjaxRecupMessages() ;
        }
    });
}) ;

/*  RECUPERATION DES MESSAGES  */

//je demande à recupMessages.php et j'obtiens un tableau 


function requeteAjaxRecupMessages() {
    ajaxMultisurfaces({
        method: 'POST',
        url: 'recupMessages.php',
        args: "salon=1",
        callback: function(response) {
            let listeMessages = document.getElementById('liste-messages') ;
            let tableauMsg = JSON.parse(response) ;
            for(let msg of tableauMsg) {
                let citation = new Message(msg.id, msg.auteur, msg.alias, msg.date_post, msg.message) ;
                console.log(citation) ;
                let newMsg = citation.afficheMessage() ;
                listeMessages.appendChild(newMsg);
                listeMessages.appendChild(document.createElement("hr"));
            }
        }
    });
}