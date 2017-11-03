<?php

require_once('classes/Database.php') ;

    $salon = $_POST['salon'] ;
    
    //recup tous les messages du salon $id avec id supérieur à $_SESSION
    $bdd = new Database() ;

    $tableauConnectes = $bdd->readListeConnectes($salon) ;
      
    $tableauConnectesJSON = json_encode($tableauConnectes);

    header('Content-type: application/json');
    echo $tableauConnectesJSON  ;