<?php session_start(); ?>

<!DOCTYPE html>

<html lang="fr">
<?php
    require_once("templates/head.html") ;
    
    require_once("classes/imports.php") ;
?>
<body>
<?php
    include_once("templates/header.php") ;
    
    //si pas de pseudo donné ni id qui ne soit pas un visiteur, on renvoie en page d'accueil
    if(!isset($_POST['pseudo'])) {
        header('Location:index.php') ;
    } else {
        $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $idSalon = isset($POST['salon']) ? $POST['salon'] : 1 ;
        $salon = $bdd->readSalon($idSalon) ;
        
        if(!isset($POST['motdepasse'])) {
            if($bdd->issetPseudo($POST['pseudo']) == true) {
                echo "Ce pseudo existe déjà !" ;
                header('Location:index.php') ;
            } else {
                $_SESSION['id'] = 4 ;
                $user = new User($POST['pseudo'], $POST['pseudo'], 'grey', 'user') ;
            }
        } else {
            if($bdd->issetPseudo($POST['pseudo']) == false) {
                //inscription
                
            } else {
                //on checke la compatibilité pseudo+mdp avec ce qu'il y a en bdd
            }
            
            $_SESSION['id'] = 4 ;
            $user = new User($POST['pseudo'], $POST['pseudo'], 'grey', 'user') ;
            
        }
   
        $_SESSION['lastMsgId'] = $bdd->getLastMsgId($POST['salon']) ;
        
        include_once("templates/v_tchat.php") ;
    
    }
    
    include_once("templates/footer.html") ;

?>
    
<script src="static/ajaxMultisurfaces.js"></script>
<script src="static/Message.js"></script>
<script src="static/script.js"></script>

</body> 
</html>