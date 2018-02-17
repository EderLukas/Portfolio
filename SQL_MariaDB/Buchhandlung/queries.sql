/*Aufg a*/
SELECT Vorname,
	Nachname,
	KundeID,
	StrasseNr,
	PLZ,
	Ort
FROM kunde;

/*Aufg b*/
SELECT kunde.Vorname,
	kunde.Nachname,
	kunde.KundeID,
	kunde.StrasseNr,
	kunde.PLZ,
	kunde.Ort,
	kontakt.Medium
FROM kunde
INNER JOIN kontakt ON kunde.KontaktIDFS=kontakt.KontaktID;

/*Aufg d*/
SELECT ISBN AS "Buch-Nr.",
	Titel,
	Autor,
	Preis,
	ROUND((Preis*1.15), 2) AS "Preis + 15%"
FROM buch
ORDER BY Preis DESC;