DROP DATABASE IF EXISTS chat; 
CREATE DATABASE chat; 
USE chat; 


-- CREATE USER IF NOT EXISTS 'robin'@'localhost' IDENTIFIED BY 'ILuvBatman'; 
-- GRANT ALL ON chat.* TO 'robin'@'localhost';


CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB; 

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `conversation` varchar(128) DEFAULT NULL COMMENT 'Le nom du salon de la conversation',
  `date_message` datetime DEFAULT current_timestamp(),
  `message` text DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `contrainte_cle_etrangere_utilisateur` (`utilisateur_id`),
  CONSTRAINT `contrainte_cle_etrangere_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`)
) ENGINE=InnoDB; 

INSERT INTO utilisateurs(pseudo, email, date_naissance) VALUES ('Bobbi', "bobbi@bibbo.com", "1908-12-01"); 
INSERT INTO utilisateurs(pseudo, email, date_naissance) VALUES ('Bibbo', "bibbo@bobbi.com", "1908-12-01"); 
INSERT INTO utilisateurs(pseudo, email, date_naissance) VALUES ('Homer', "homer@simpson.fox", "1987-04-19"); 
INSERT INTO utilisateurs(pseudo, email, date_naissance) VALUES ('Luke', "luke@skywalker.com", "1977-05-04"); 
INSERT INTO utilisateurs(pseudo, email, date_naissance) VALUES ('Chuck', "chuck@norris.com", "1940-03-10"); 
INSERT INTO utilisateurs(pseudo, email, date_naissance) VALUES ('Batman', "bat@man.com", "1939-05-01"); 
INSERT INTO utilisateurs(pseudo, email, date_naissance) VALUES ('Robin', "robin@man.com", "1940-05-05"); 
INSERT INTO utilisateurs(pseudo, email, date_naissance) VALUES ('Superman', "super@man.com", "1938-04-18"); 
INSERT INTO utilisateurs(pseudo, email, date_naissance) VALUES ('Spiderman', "spider@man.com", "1962-06-05"); 

INSERT INTO messages(conversation, message, utilisateur_id) VALUES ('Bobbi', "Salut, je suis bien chez Bobbi?", 3);
INSERT INTO messages(conversation, message, utilisateur_id) VALUES ('Bobbi', "Oui, bienvenue !", 1); 
INSERT INTO messages(conversation, message, utilisateur_id) VALUES ('Bibbo', "Salut, je suis bien chez Bibbo?", 3);
INSERT INTO messages(conversation, message, utilisateur_id) VALUES ('Bibbo', "Hello, oui oui!", 2); 
INSERT INTO messages(conversation, message, utilisateur_id) VALUES ('Bibbo', "Salut, je suis bien chez Bobbi?", 4); 
INSERT INTO messages(conversation, message, utilisateur_id) VALUES ('Bibbo', "Non c'est à côté", 2); 
