<?php

class Database {
    
    protected $bddMinitchat ;
            
    public function __construct() {
        $ini_array = parse_ini_file("admin/admin.ini");

        $chemin = 'mysql:host='.$ini_array['host'].';dbname='.$ini_array['dbname'] ;
        
        try {
            $bdd = new \PDO($chemin, $ini_array['username'], $ini_array['passwrd']);
            $bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->bddMinitchat = $bdd ;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

/* SALONS */
    //READ one
    public function readSalon(int $id):Salon {
        $reponse = $this->bddMinitchat->prepare('SELECT * FROM salons WHERE id_salon = ? ');
        $reponse->execute(array($id));

        $donnees = $reponse->fetch() ;
        //ETUDE : voir si pas simplifiable
        $id_salon = $donnees['id_salon'] ;
        $nom_salon = $donnees['nom_salon'] ;
        $id_createur = $donnees['id_createur'] ;
        $private = $donnees['private'] ;
        $sel_salon = $donnees['sel_salon'] ;
        $hash_salon = $donnees['hash_salon'] ;
              
        $salon = new Salon($nom_salon, $id_createur, $private, $sel_salon, $hash_salon, $id_salon) ;
        
        $reponse->closeCursor();
        
        return $salon ;
    }
    
    
    //READ all
    public function readListeSalons():array {
        $reponse = $this->bddMinitchat->query('SELECT id_salon FROM salons WHERE private = false');
        
        $listeSalons = [] ;
        
        while ($donnees = $reponse->fetch()) {
            $id = $donnees['id_salon'] ;
            $listeSalons[$id] = $this->readSalon($donnees['id_salon']) ;
        }
        
        $reponse->closeCursor();
        
        return $listeSalons ;
    }

/* MEMBRES */
    //READ one
    public function readPseudoMembre(int $id):string {
        $reponse = $this->bddMinitchat->prepare('SELECT pseudo FROM membres WHERE id_membre = ? ');
        $reponse->execute(array($id));
        
        $pseudo = $reponse->fetch() ;
                
        $reponse->closeCursor();
        
        return $pseudo ;
    }
    
    
    public function readMembre(int $id):Membre {

    }
    //READ all
    

/* MESSAGES */
    //READ one
    public function readMessage(int $id):Message {
        $reponse = $this->bddMinitchat->prepare('SELECT * FROM messages WHERE id_message = ? ');
        $reponse->execute(array($id));

        $donnees = $reponse->fetch() ;
        //ETUDE : voir si pas simplifiable
        $id_auteur = $donnees['id_auteur'] ;
        $msg = $donnees['message'] ;
        $alias = $donnees['alias'] ;
        $id_salon = $donnees['id_salon'] ;
        $id_message = $donnees['id_message'] ;
        $date_post = $donnees['date_post'] ;
              
        $message = new Message($id_auteur, $msg, $alias, $id_salon, $id_message, $date_post) ;
        $reponse->closeCursor();
        
        return $message ;
    }
    
    
    //READ all
    public function readListeMessages(int $id_salon):array {
        $reponse = $this->bddMinitchat->prepare('SELECT id_message FROM messages WHERE id_salon = ? ');
        $reponse->execute(array($id_salon));
        
        $listeMessages = [] ;
        
        while ($donnees = $reponse->fetch()) {
            $listeMessages[] = $this->readMessage($donnees['id_message']) ;
        }
        
        $reponse->closeCursor();
        
        return $listeMessages ;
        
    }
    
    

/* CONNECTES */    
    public function readListeConnectes(int $idSalon):array {
        $reponse = $this->bddMinitchat->prepare('SELECT * FROM connectes WHERE id_salon = ? ');
        $reponse->execute(array($idSalon));
        
        $listeConnectes = [] ;
        
        while ($donnees = $reponse->fetch()) {
            $id = $donnees['id_membre'] ;
            $listeConnectes[] = readPseudoMembre($id) ;
        }
        
        return $listeConnectes ;
    }
}
