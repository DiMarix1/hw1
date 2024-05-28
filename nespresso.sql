CREATE DATABASE nespresso;
use nespresso;

CREATE TABLE utenti(
	nome VARCHAR(255),
    cognome VARCHAR(255),
    email VARCHAR(255),
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255),
    PRIMARY KEY (nome, cognome, username) 
);

CREATE TABLE articoli(
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    prezzo FLOAT,
    quantita INTEGER,
    img VARCHAR(100)
);

INSERT INTO articoli value("","Lisbon Bica", 0.55, 10, "https://www.nespresso.com/ecom/medias/sys_master/public/30236143058974.png");
INSERT INTO articoli values(0,"Alto Ambrato", 0.75, 10, "https://www.nespresso.com/ecom/medias/sys_master/public/26426205831198.png"),
(0,"Vividà", 0.70, 10, "https://www.nespresso.com/ecom/medias/sys_master/public/30734595424286.png"),
(0,"Dessert Bowls", 12.00, 10, "https://www.nespresso.com/ecom/medias/sys_master/public/30177745076254.png"),
(0,"Vertical Display Original", 39.00, 10, "https://www.nespresso.com/ecom/medias/sys_master/public/29573439488030.png"),
(0,"Vertical Display Vertuo", 42.00, 10, "https://www.nespresso.com/ecom/medias/sys_master/public/29573419335710.png"),
(0,"Travel Mug Small", 24.00, 10, "https://www.nespresso.com/ecom/medias/sys_master/public/29659363442718.png");


CREATE TABLE cart(
	id integer AUTO_INCREMENT,
    index(user_id),
    user_id VARCHAR(255)
		REFERENCES utenti(username),
	index(item_id),
    item_id INTEGER
		REFERENCES articoli(id),
	qnt INTEGER,
	PRIMARY KEY(id, user_id)
);