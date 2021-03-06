<?php

class Message implements JsonSerializable {
    
    protected $id_message ;
    protected $id_auteur ;
    protected $aliass ;
    protected $date_post ;
    protected $message ;
    protected $id_salon ;
    
    function __construct(int $id_auteur, string $message, string $aliass, int $id_salon, $id_message = null, $date_post = null) {
        $this->id_message = $id_message;
        $this->id_auteur = $id_auteur;
        $this->aliass = $aliass;
        $this->date_post = $date_post;
        $this->message = $message;
        $this->id_salon = $id_salon;
    }

    public function jsonSerialize() {
        
        $bdd = new Database() ;
        
	return [
            'id' => $this->id_message,
            'auteur' => $bdd->readPseudoMembre($this->id_auteur),
            'alias' => $this->aliass,
            'date_post' => $this->date_post,
            'message' => $this->message
	] ;
    }
//SETTERS

    function setIdMessage(int $id_message) {
        $this->id_message = $id_message;
    }

    function setIdAuteur(int $id_auteur) {
        $this->id_auteur = $id_auteur;
    }

    function setAliass(string $aliass) {
        $this->aliass = $aliass;
    }

    function setDatePost($date_post) {
        $this->date_post = $date_post;
    }

    function setMessage(string $message) {
        $this->message = $message;
    }

    function setIdSalon(int $id_salon) {
        $this->id_salon = $id_salon;
    }




//GETTERS

    function getIdMessage():int {
        return $this->id_message;
    }

    function getIdAuteur():int {
        return $this->id_auteur;
    }

    function getAliass():string {
        return $this->aliass;
    }

    function getDatePost() {
        return $this->date_post;
    }

    function getMessage():string {
        return $this->message;
    }

    function getIdSalon():int {
        return $this->id_salon;
    }


}
