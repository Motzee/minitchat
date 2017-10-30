<?php
session_start();

require_once('classes/Message.php') ;
require_once('classes/Database.php') ;

//ça reçoit une requête en POST json : ça en fait un message et ça l'écrit dans la base de données
if(isset($_POST['message'])) {
    //$POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    $newMessage = json_decode($_POST['message'], true);
    
    $idAuteur = $_SESSION['id'] ;

    $message= new Message($idAuteur, $newMessage['msg'], $newMessage['alias'], $newMessage['idSalon']) ;

    $bdd = new Database() ;

    $bdd->createMessage($message) ;
    
} else {
    http_response_code(400);
    return 'mauvaise requête, veuillez envoyer du JSON dans une variable $_POST[\'message\'] ' ;
}

