<?php

class Membre {
            
    protected $id_membre ;
    protected $pseudo ;
    protected $statut ;
    protected $date_inscript ;
    protected $sel_mdp ;
    protected $hash_mdp ;
    protected $email ;
    protected $color_text ;
 
    function __construct($pseudo, $statut, $sel_mdp, $hash_mdp, $color_text = 'black', $email = null, $date_inscript = null, $id_membre = null) {
        $this->id_membre = $id_membre;
        $this->pseudo = $pseudo;
        $this->statut = $statut;
        $this->date_inscript = $date_inscript;
        $this->sel_mdp = $sel_mdp;
        $this->hash_mdp = $hash_mdp;
        $this->email = $email;
        $this->color_text = $color_text;
    }

    
//SETTERS
    function setId_membre(int $id_membre) {
        $this->id_membre = $id_membre;
    }

    function setPseudo(string $pseudo) {
        $this->pseudo = $pseudo;
    }

    function setStatut(string $statut) {
        $this->statut = $statut;
    }

    function setDate_inscript($date_inscript) {
        $this->date_inscript = $date_inscript;
    }

    function setSel_mdp(string $sel_mdp) {
        $this->sel_mdp = $sel_mdp;
    }

    function setHash_mdp(string $hash_mdp) {
        $this->hash_mdp = $hash_mdp;
    }

    function setEmail(string $email) {
        $this->email = $email;
    }

    function setColor_text(string $color_text) {
        $this->color_text = $color_text;
    }

//GETTERS
    
    function getId_membre():int {
        return $this->id_membre;
    }

    function getPseudo():string {
        return $this->pseudo;
    }

    function getStatut():string {
        return $this->statut;
    }

    function getDate_inscript() {
        return $this->date_inscript;
    }

    function getSel_mdp():string {
        return $this->sel_mdp;
    }

    function getHash_mdp():string {
        return $this->hash_mdp;
    }

    function getEmail():string {
        return $this->email;
    }

    function getColor_text():string {
        return $this->color_text;
    }


    
}