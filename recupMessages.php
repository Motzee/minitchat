<?php
session_start();

require_once('classes/Message.php') ;
require_once('classes/Database.php') ;

    $salon = $_POST['salon'] ;
    $lastId = $_SESSION['lastMsgId'] ;
    
    //recup tous les messages du salon $id avec id supérieur à $_SESSION
    $bdd = new Database() ;

    $tableauMsg = $bdd->readNewMsg($salon, $lastId) ;
      
    $tableauMsgJSON = json_encode($tableauMsg);

    header('Content-type: application/json');
    echo $tableauMsgJSON  ;
    
    //et je rectifie le dernier lastIdMsg
    $_SESSION['lastMsgId'] = $bdd->getLastMsgId($salon) ;