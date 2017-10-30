<?php

class Salon {
    
    protected $id_salon ;
    protected $nom_salon ;
    protected $id_createur ;
    protected $private ;
    protected $sel_salon ;
    protected $hash_salon ;
    

    function __construct($nom_salon, $id_createur, $private = false, $sel_salon = null, $hash_salon = null, $id_salon = null) {
        $this->id_salon = $id_salon;
        $this->nom_salon = $nom_salon;
        $this->id_createur = $id_createur;
        $this->private = $private;
        $this->sel_salon = $sel_salon;
        $this->hash_salon = $hash_salon;
    }

//SETTERS
    function setIdSalon(int $id_salon) {
        $this->id_salon = $id_salon;
    }

    function setNomSalon(string $nom_salon) {
        $this->nom_salon = $nom_salon;
    }

    function setIdCreateur(int $id_createur) {
        $this->id_createur = $id_createur;
    }

    function setPrivate(bool $private) {
        $this->private = $private;
    }

    function setSelSalon(string $sel_salon) {
        $this->sel_salon = $sel_salon;
    }

    function setHashSalon(string $hash_salon) {
        $this->hash_salon = $hash_salon;
    }


    
//GETTERS
    function getIdSalon():int {
        return $this->id_salon;
    }

    function getNomSalon():string {
        return $this->nom_salon;
    }

    function getIdCreateur():int {
        return $this->id_createur;
    }

    function getPrivate():bool {
        return $this->private;
    }

    function getSelSalon():string {
        return $this->sel_salon;
    }

    function getHashSalon():string {
        return $this->hash_salon;
    }


}
