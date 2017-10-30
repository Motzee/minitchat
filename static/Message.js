class Message {
    
    constructor(id, auteur, alias, date, msg) {
        this.id = id ;
        this.auteur = auteur ;
        this.alias = alias ;
        this.date_post = date ;
        this.message = msg ;
    }
  
    afficheMessage() {
        let blockquote = document.createElement("blockquote") ;
        
        let auteur = document.createElement("cite") ;
        auteur.className = "alias" ;
        auteur.title = this.auteur + ", le " + this.date_post ;
        
        let paragraphe = document.createElement("p") ;
        paragraphe.textContent = this.message ;
        
        
        
        
        
        /*
        '<blockquote><cite class="alias" title="'.$pseudo.', à '.$message->getDatePost().'">'.$message->getAliass().'</cite><p>'.$message->getMessage().'</p></blockquote>' ;
        */
        return $element ;
    }
  
}