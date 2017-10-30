USE minitchat ;

DROP TABLE if exists membres ;

CREATE TABLE membres (
    id_membre INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    pseudo VARCHAR(32) NOT NULL,
    statut VARCHAR(32) NOT NULL,
    date_inscript TIMESTAMP,
    sel_mdp VARCHAR(512) NOT NULL,
    hash_mdp VARCHAR(512) NOT NULL,
    email VARCHAR(64),
    color_text VARCHAR(32)
) ;


DROP TABLE if exists salons ;

CREATE TABLE salons (
	id_salon INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nom_salon VARCHAR(32),
	id_createur INT NOT NULL,
	FOREIGN KEY (id_createur) REFERENCES membres(id_membre),
	private BOOL NOT NULL,
	sel_salon VARCHAR(512),
	hash_salon VARCHAR(512)
) ;


DROP TABLE if exists connectes ;

CREATE TABLE connectes (
	id_salon INT NOT NULL,
	id_membre INT NOT NULL,
	FOREIGN KEY (id_salon) REFERENCES salons(id_salon),
    FOREIGN KEY (id_membre) REFERENCES membres(id_membre),
    PRIMARY KEY (id_salon, id_membre)
) ;


DROP TABLE if exists messages ;

CREATE TABLE messages (
    id_message INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_auteur INT NOT NULL,
    FOREIGN KEY (id_auteur) REFERENCES membres(id_membre),
    aliass VARCHAR(32),
    date_post TIMESTAMP,
    message VARCHAR(512) NOT NULL,
    id_salon INT NOT NULL,
    FOREIGN KEY (id_salon) REFERENCES salons(id_salon)
) ;
