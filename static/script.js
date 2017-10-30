/*
*/

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
            console.log(response) ;
        }
    });
}) ;

