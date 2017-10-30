<?php

class User {
    protected $id ;
    protected $pseudo ;
    protected $alias ;
    protected $color_txt ;
    protected $statut ;
    
    
    
    function __construct(string $pseudo, string $alias, string $color_txt, string $statut, $id = null) {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->alias = $alias;
        $this->color_txt = $color_txt;
        $this->statut = $statut;
    }


//SETTERS    
    function setId(int $id) {
        $this->id = $id;
    }

    function setPseudo(string $pseudo) {
        $this->pseudo = $pseudo;
    }

    function setAlias(string $alias) {
        $this->alias = $alias;
    }

    function setColor_txt(string $color_txt) {
        $this->color_txt = $color_txt;
    }

    function setStatut(string $statut) {
        $this->statut = $statut;
    }


    
//GETTERS

    function getId() {
        return $this->id;
    }

    function getPseudo():string {
        return $this->pseudo;
    }

    function getAlias():string {
        return $this->alias;
    }

    function getColor_txt():string {
        return $this->color_txt;
    }

    function getStatut():string {
        return $this->statut;
    }


}



