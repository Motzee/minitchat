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
    
    if(isset($_POST)) {
        $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //si réception que de pseudo et salon : check pseudo non-réservé et connexion
        if(!isset($_SESSION['id'])) {
            $_SESSION['id'] = 4 ;
        }
        
        //a a aussi transmis un mdp on check : si pseudo existe dans bdd on va tenter mdp, sinon inscription
        
        //sinon : affiche qu'il manque un paramètre
        
        
        
        
        
        $user = new User($POST['pseudo'], $POST['pseudo'], 'grey', 'user') ;
        
    } else {
        header('Location:index.php') ;
    }
    
    $_SESSION['lastMsgId'] = $bdd->getLastMsgId($POST['salon']) ;
    
    $salon = $bdd->readSalon($POST['salon']) ;

    include_once("templates/v_tchat.php") ;
    
    include_once("templates/footer.html") ;

?>
</body> 
</html>