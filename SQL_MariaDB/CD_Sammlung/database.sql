/*Datenbank erstellen*/
CREATE DATABASE funky;

USE funky;

/*Tabelle erstellen*/
CREATE TABLE album (
	album_pk INTEGER(4) NOT NULL AUTO_INCREMENT,
	title VARCHAR(20),
	price DECIMAL(5,2) DEFAULT NULL,
	publ_date DATE NOT NULL,
	PRIMARY KEY (album_pk)
	) ENGINE=InnoDB;

/*Datensätze erstellen*/
INSERT INTO album (title, price, publ_date)
	VALUES
		("Inner Peace", 21.90, '2012-03-15'),
		("Harmony", 34.20, '2017-02-07'),
		("Revolution", 15.85, '2015-04-06'),
		("Overkill", 30.45, '1979-12-09'),
		("NULL CASE", NULL, '0000-00-00');

/*Tabelle erstellen*/
CREATE TABLE interpret (
	interpret_pk INTEGER(4) NOT NULL AUTO_INCREMENT,
	name VARCHAR(20),
	PRIMARY KEY (interpret_pk)
	) ENGINE=InnoDB;

/*Datensätze erstellen*/
INSERT INTO interpret (name)
	VALUES
		("CloZee"),
		("Motorhead");

/*Tabelle erstellen*/		
CREATE TABLE songs (
	song_pk INTEGER(4) NOT NULL AUTO_INCREMENT,
	title VARCHAR(20),
	interpret_fk INTEGER(4) DEFAULT NULL,
	album_fk INTEGER(4) NOT NULL,
	PRIMARY KEY (song_pk),
	FOREIGN KEY (interpret_fk) REFERENCES interpret(interpret_pk),
	FOREIGN KEY (album_fk) REFERENCES album(album_pk)
	) ENGINE=InnoDB;

/*Index für Fremdschlüssel kreiern*/	
CREATE INDEX interpret_fk_index
	ON songs (interpret_fk);	

CREATE INDEX album_fk_index
	ON songs (album_fk);

/*Datensätze erstellen*/
INSERT INTO songs (title, interpret_fk, album_fk)
	VALUES
		("Overkill", 2, 4),
		("Stay Clean", 2, 4),
		("Damage Case", 2, 4),
		("Metropolis", 2, 4),
		("No Class", 2, 4),
		("Anticlimax", 1, 3),
		("Revolution", 1, 3),
		("Asapara Calling", 1, 3),
		("Inner Peace", 1, 1),
		("Erase The Borders", 1, 1),
		("Symfonia", 1, 1),
		("Secret Place", 1, 2),
		("Lonely Island", 1, 2),
		("Black Panther", 1, 2),
		("Drip", 1, 2),
		("NULL CASE", NULL, 4);

/*Tabelle erstellen*/
CREATE TABLE oebis (
	oebis_pk INTEGER(4)
	) ENGINE=InnoDB;
	
/*bestehende Tabelle verändern*/		
ALTER TABLE album
	ADD interpret_fk INTEGER(4) DEFAULT NULL;

/*bestehende Datensätze erweitern*/	
UPDATE album
	SET interpret_fk = 1
	WHERE title = "Inner Peace" OR title="Harmony" OR title="Revolution";

UPDATE album
	SET interpret_fk = 2
	WHERE title = "Overkill";

/*bestehende Tabelle ändern*/
ALTER TABLE album
	ADD FOREIGN KEY (interpret_fk) REFERENCES interpret(interpret_pk);
	
/*Tabelle Umbenennen*/
RENAME TABLE interpret TO artist;

/*bestehender Datensatz ändern*/
UPDATE album
	SET publ_date = '2016-06-15'
	WHERE title = "Revolution";

UPDATE album
	SET publ_date = '2014-03-06'
	WHERE title = "Inner Peace";

/*Löschen eines bestehenden Datensatzes*/
DELETE FROM songs
WHERE title="Symfonia";

/*Löschen einer Tabelle (komplett)*/
DROP TABLE oebis;

/*Aufräumen: überall interpret zu artist ändern.*/
ALTER TABLE artist
	CHANGE COLUMN interpret_pk artist_pk INTEGER(4) NOT NULL AUTO_INCREMENT;
	
ALTER TABLE songs
	CHANGE COLUMN interpret_fk artist_fk INTEGER(4);

ALTER TABLE album
	CHANGE COLUMN interpret_fk artist_fk INTEGER(4);

/*alles mögliche anzeigen*/
SELECT * FROM songs;
SELECT * FROM album;
SELECT * FROM artist;

DESC songs;
DESC album;
DESC artist;

SHOW INDEXES FROM songs;
SHOW INDEXES FROM album;
SHOW INDEXES FROM artist;