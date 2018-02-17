CREATE TABLE kontakt(
	KontaktID INTEGER(4) NOT NULL AUTO_INCREMENT,
	Medium VARCHAR(20),
	Datum DATE NOT NULL,
	Betriebsgroesse VARCHAR(6),
	PRIMARY KEY (KontaktID)
	) ENGINE=InnoDB;
	
CREATE INDEX KontaktID_index
	ON kontakt (KontaktID);
	
CREATE TABLE kunde(
	KundeID INTEGER(4) NOT NULL AUTO_INCREMENT,
	Nachname VARCHAR(20),
	Vorname VARCHAR(20),
	StrasseNr VARCHAR(35),
	PLZ INTEGER(4),
	Ort VARCHAR(20),
	Telefon VARCHAR(10),
	Bemerkung VARCHAR(20),
	KontaktIDFS INTEGER(4) DEFAULT NULL,
	PRIMARY KEY (KundeID),
	FOREIGN KEY (KontaktIDFS) REFERENCES kontakt (KontaktID)
	) ENGINE=InnoDB;

CREATE INDEX KundeID_index
	ON kunde (KundeID);

CREATE TABLE lieferant(
	LieferantID INTEGER(4) NOT NULL AUTO_INCREMENT,
	Lieferantname VARCHAR(20),
	StrasseNr VARCHAR(35),
	PLZ INTEGER(4),
	Ort VARCHAR(20),
	Telefon VARCHAR(10),
	PRIMARY KEY (LieferantID)
	) ENGINE=InnoDB;

CREATE INDEX LieferantID_index
	ON lieferant (LieferantID);

	
CREATE TABLE bestellung(
	BestellID INTEGER(4) NOT NULL AUTO_INCREMENT,
	Datum DATE NOT NULL,
	KundIDFS INTEGER(4) DEFAULT NULL,
	Sachbearbeiter INTEGER(6),
	Telefon VARCHAR(10),
	Kurzzeichen VARCHAR(6),
	PRIMARY KEY (BestellID),
	FOREIGN KEY (KundIDFS) REFERENCES kunde (KundeID)
	) ENGINE=InnoDB;

CREATE INDEX BestellID_index
	ON bestellung (BestellID);

CREATE TABLE buch(
	BuchID INTEGER(4) NOT NULL AUTO_INCREMENT,
	Titel VARCHAR(100),
	ISBN VARCHAR(13),
	Autor VARCHAR(20),
	Preis DECIMAL(7,2),
	Verlag VARCHAR(25),
	LieferantIDFS INTEGER(4) DEFAULT NULL,
	PRIMARY KEY (BuchID),
	FOREIGN KEY (LieferantIDFS) REFERENCES lieferant (LieferantID)
	) ENGINE=InnoDB;

CREATE INDEX BuchID_index
	ON buch (BuchID);

CREATE TABLE bestelldetail(
	BestelldetailID INTEGER(4) NOT NULL AUTO_INCREMENT,
	BestellungIDFS INTEGER(4) DEFAULT NULL,
	BuchIDFS INTEGER(4) DEFAULT NULL,
	Menge INTEGER(6),
	PRIMARY KEY (BestelldetailID),
	FOREIGN KEY (BestellungIDFS) REFERENCES bestellung (BestellID),
	FOREIGN KEY (BuchIDFS) REFERENCES buch (BuchID)
	) ENGINE=InnoDB;
	
CREATE INDEX BestelldetailID_index
	ON bestelldetail (BestelldetailID);

INSERT INTO kontakt
	(Medium, Datum, Betriebsgroesse)
	VALUES
		('Internet', '1998-05-12', 'gross'),
		('Internet', '1998-07-23', 'mittel'),
		('Internet', '1988-09-01', 'klein'),
		('Inserat', '2001-02-15', 'klein'),
		('Inserat', '2002-11-01', 'gross'),
		('Event', '2005-12-12', 'klein'),
		('Event', '2006-03-30', 'mittel'),
		('Event', '2017-04-14', 'klein'),
		('Plakat', '2014-06-20', 'mittel'),
		('Plakat', '2015-04-12', 'mittel');

INSERT INTO kunde
	(Nachname, Vorname, StrasseNr, PLZ, Ort, Telefon, Bemerkung, KontaktIDFS)
	VALUES
		('Eder', 'Lukas', "Holzruetistrasse 6g", 5443, 'Niederrohrdorf', 07972724276, 'VIP', 1),
		('DeLarue', 'Leanne', "Pont du ferise 45", 6300, 'Paris', 02198456829, 'Deluxe', 2),
		('Salvisic', 'Vadim', "Soodplagg 8a", 0042, 'Prag', 2238987741, 'Stammkunde', 3),
		('Jaas', 'Hanna', "Mieslund 2", 2323, 'Oslo', 0017853434, 'Stammkunde', 4),
		('Sramm', 'Thorsten', "Heimweg 3", 7345, 'Berlin', 0043332984, 'Deluxe', 5),
		('AlAchmun', 'Jusuf', "Tuhnareg B", 7621, 'Dubai', 4329887212, 'Studentenrabat', 6),
		('Parker', 'June', "Douverway 23a3", 5427, 'Tennessee', 1145608732, 'Studentenrabat', 7),
		('Croft', 'Lara', "Croft Manors", 3458, 'Surrey', 0422227592, 'Studentenrabat', 8),
		('Lee', 'Han', "Wo Tao ga 35433", 7797, "Hong Kong", 8753930023, 'Treuebonus', 9),
		('Koyoshi', 'Satanoros', "Hio Ui 9", 1234, 'Tokyo', 4934583145, 'Treuebonus', 10);
			
INSERT INTO lieferant 
	(Lieferantname, StrasseNr, PLZ, Ort, Telefon)
	VALUES
		('Buchfix', "Industriestrasse 5", 5620, 'Bremgarten', 0566316311),
		('FlyingBooks', "Hohlstrasse 50", 8001, 'Zuerich', 0435562323),
		('Spedicus', "Wagenrain 4d", 5212, "Hausen AG", 0897643843),
		('LibrioPronto', "De la Casa 9", 6780, 'Airolo', 0338753395);
	
INSERT INTO bestellung
	(Datum, KundIDFS, Sachbearbeiter, Telefon, Kurzzeichen)
	VALUES
		("2007-08-13", 1, 5512, 0723315512, 'mau'),
		("2007-04-05", 8, 5513, 0723315513, 'har'),
		("2007-06-23", 1, 5517, 0723315517, 'rod'),
		("2007-03-21", 5, 5522, 0723315522, 'hel'),
		("2007-03-09", 1, 5512, 0723315522, 'hel'),
		("2007-11-05", 2, 5512, 0723315512, 'mau'),
		("2007-12-09", 8, 5522, 0723315522, 'hel'),
		("2007-12-11", 3, 5513, 0723315513, 'har'),
		("2007-04-30", 3, 5531, 0723315531, 'lan'),
		("2007-07-17", 4, 5517, 0723315517, 'rod'),
		("2007-09-18", 7, 5512, 0723315512, 'mau'),
		("2007-06-21", 5, 5522, 0723315522, 'hel'),
		("2007-06-25", 10, 5517, 0723315517, 'rod'),
		("2007-03-01", 6, 5517, 0723315517, 'rod'),
		("2007-05-13", 6, 5513, 0723315513, 'har'),
		("2007-05-08", 7, 5531, 0723315531, 'lan'),
		("2007-02-02", 8, 5522, 0723315522, 'hel'),
		("2007-01-05", 9, 5517, 0723315517, 'rod'),
		("2007-08-15", 10, 5531, 0723315531, 'lan');
	
INSERT INTO buch
	(Titel, ISBN, Autor, Preis, Verlag, LieferantIDFS)
	VALUES
		('C++', 9783836243605, "Torsten T. Will", 50.55, "Rheinwerk Computing", 3),
		('Java ist auch eine Insel', 9783836258692, "Christian Ullenboom", 63.25, "Rheinwerk Computing", 2),
		("Einstieg in Unity", 9783836242929, "Thomas Theis", 34.90, "Rheinwerk Computing", 1),
		('C#', 9783836244930, "Thomas Theis", 26.80, "Rheinwerk Computing", 1),
		('Javascript', 9783836243070, "Stephan Elter", 29.75, "Rheinwerk Computing", 3),
		("Swift 4", 9783836259200, "Michael Kofler", 54.90, "Rheinwerk Computing", 2),
		('Einstieg in XML', 9783836237987, "Helmut Vonhoegen", 44.90, "Rheinwerk Computing", 2);
	
INSERT INTO bestelldetail
	(BestellungIDFS, BuchIDFS, Menge)
	VALUES
		(1, 1, 1),
		(2, 2, 1),
		(3, 3, 1),
		(4, 4, 1),
		(5, 5, 1),
		(6, 6, 1),
		(7, 7, 1),
		(8, 6, 1),
		(9, 2, 1),
		(10, 5, 1),
		(11, 3, 1),
		(12, 1, 1),
		(13, 2, 1),
		(14, 7, 1),
		(15, 7, 1),
		(16, 4, 1),
		(17, 6, 1),
		(18, 2, 1),
		(19, 1, 1);
