drop database if exists CamperRomagna;
create database CamperRomagna;
use CamperRomagna;

create table if not exists PRODOTTO(
	idProdotto INT NOT NULL AUTO_INCREMENT,
	nome VARCHAR(100) NOT NULL,
	marca VARCHAR(25) NOT NULL,
	prezzo FLOAT(24) NOT NULL,
	descrizione MEDIUMTEXT NOT NULL,
	img VARCHAR(100) NOT NULL,
	qnt INT NOT NULL ,
	tipo VARCHAR(24) NOT NULL,
  PRIMARY KEY (idProdotto)
);

create table if not exists SPECIFICHE_CAMPER(
	idSpecifica INT NOT NULL AUTO_INCREMENT,
	idProdotto INT NOT NULL ,
	telaio VARCHAR(100) NOT NULL,
	postiViaggio INT NOT NULL ,
	postiLetto VARCHAR(10) NOT NULL,
	lunghezza INT NOT NULL ,
	larghezza INT NOT NULL ,
	altezza INT NOT NULL ,
	massaVuoto INT NOT NULL ,
	massaPieno INT NOT NULL ,
	cerchiLega BOOLEAN,
	luciLed BOOLEAN,
	adas BOOLEAN,
  PRIMARY KEY (idSpecifica,idProdotto),
  FOREIGN KEY (idProdotto) REFERENCES PRODOTTO(idProdotto)
);

create table if not exists IMMAGINE(
	url VARCHAR(100) NOT NULL,
	idProdotto INT NOT NULL ,
	PRIMARY KEY (url,idProdotto),
	FOREIGN KEY (idProdotto) REFERENCES PRODOTTO(idProdotto)
);

create table if not exists UTENTE(
	email VARCHAR(100) NOT NULL,
	nome VARCHAR(50) NOT NULL,
	cognome VARCHAR(50) NOT NULL,
	password VARCHAR(128) NOT NULL,
	isAdmin BOOLEAN,
	PRIMARY KEY(email)
);

create table if not exists ORDINE(
	idOrdine INT NOT NULL AUTO_INCREMENT,
	idUtente VARCHAR(100) NOT NULL,
	dataOrdine DATE NOT NULL,
	isConsegnato BOOLEAN,
	PRIMARY KEY(idOrdine),
	FOREIGN KEY (idUtente) REFERENCES UTENTE(email)
);

create table if not exists PRODOTTO_IN_ORDINE(
	idOrdine INT NOT NULL,
    idProdotto INT NOT NULL ,
    qnt int NOT NULL ,
    PRIMARY KEY (idOrdine,idProdotto),
    FOREIGN KEY (idOrdine) REFERENCES ORDINE(idOrdine),
	FOREIGN KEY (idProdotto) REFERENCES PRODOTTO(idProdotto)
);

