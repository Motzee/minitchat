USE minitchat ;

/*Ajout de membres*/
INSERT INTO membres(pseudo, statut, date_inscript, sel_mdp, hash_mdp, email, color_text) VALUES('Administrateur', 'admin', '', 'test', 'test', '', 'red') ;

INSERT INTO membres(pseudo, statut, date_inscript, sel_mdp, hash_mdp, email, color_text) VALUES('Modérateur1', 'modo', '', 'test', 'test', '', 'blue') ;

INSERT INTO membres(pseudo, statut, date_inscript, sel_mdp, hash_mdp, email, color_text) VALUES('Modérateur2', 'modo', '', 'test', 'test', '', 'green') ;

INSERT INTO membres(pseudo, statut, date_inscript, sel_mdp, hash_mdp, email, color_text) VALUES('Pseudo non réservé', 'visiteur', '', 'test', 'test', '', 'yellow') ;

INSERT INTO membres(pseudo, statut, date_inscript, sel_mdp, hash_mdp, email, color_text) VALUES('UtilisateurA', 'user', '', 'test', 'test', '', 'magenta') ;

INSERT INTO membres(pseudo, statut, date_inscript, sel_mdp, hash_mdp, email, color_text) VALUES('UtilisateurB', 'user', '', 'test', 'test', '', 'orange') ;

/*Ajout de salons*/
INSERT INTO salons(nom_salon, id_createur, private, sel_salon, hash_salon) VALUES('public', 1, false, '', '') ;
INSERT INTO salons(nom_salon, id_createur, private, sel_salon, hash_salon) VALUES('simplon', 1, false, '', '') ;


/*Connexion de membres aux salons*/
INSERT INTO connectes(id_salon, id_membre) VALUES(1, 1) ;
INSERT INTO connectes(id_salon, id_membre) VALUES(1, 2) ;
INSERT INTO connectes(id_salon, id_membre) VALUES(1, 5) ;
INSERT INTO connectes(id_salon, id_membre) VALUES(2, 1) ;
INSERT INTO connectes(id_salon, id_membre) VALUES(2, 2) ;
INSERT INTO connectes(id_salon, id_membre) VALUES(2, 3) ;
INSERT INTO connectes(id_salon, id_membre) VALUES(2, 4) ;


/*Ajout de messages*/
INSERT INTO messages(id_auteur, aliass, date_post, message, id_salon) VALUES(1, "Riri", "", "Voici un premier message de test", 1) ;
INSERT INTO messages(id_auteur, aliass, date_post, message, id_salon) VALUES(1, "Fifi", "", "Voici un deuxième message de test", 1) ;

INSERT INTO messages(id_auteur, aliass, date_post, message, id_salon) VALUES(1, "Loulou", "", "Voici un premier message de test dans simplon", 2) ;
INSERT INTO messages(id_auteur, aliass, date_post, message, id_salon) VALUES(1, "Zaza", "", "Voici un deuxième message de test dans simplon", 2) ;
