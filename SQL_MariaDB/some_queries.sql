/*Aufg 4 a-c*/
SELECT mabt_fk AS 'Abt-Nr.'
FROM mitarbeiter;

SELECT mabt_fk AS 'Abt-Nr',
	mname AS 'Mitarbeiter',
	mfunktion AS 'Funktion'
FROM mitarbeiter;

SELECT mabt_fk AS 'Abt-Nr.',
	mname AS 'Mitarbeiter',
	mlohn AS 'Lohn'
FROM mitarbeiter
ORDER BY mabt_fk ASC, Lohn DESC;

/*Aufg 5 a-d*/
SELECT mname AS 'Name',
	mfunktion AS 'Funktion',
	mlohn AS 'Lohn'
FROM mitarbeiter
WHERE mfunktion='Vorsitz VR' AND mlohn > 1400.00;

SELECT mname AS 'Name',
	mfunktion AS 'Funktion',
	mlohn AS 'Lohn'
FROM mitarbeiter
WHERE mfunktion = 'Vorsitz VR' OR mfunktion = 'Sachbearbeiter'
	AND mlohn > 1400;
	
SELECT mname AS 'Mitarbeiter',
	mfunktion AS 'Funktion',
	mabt_fk	AS 'Abt.-Nr.',
	meintritt AS 'Eintritt'
FROM mitarbeiter
WHERE meintritt BETWEEN '1997-12-01' AND '1998-05-31'
ORDER BY meintritt DESC;

SELECT mname AS 'Name',
	mabt_fk AS 'Abt.-Nr.',
	mlohn*12 AS 'Total Bezug'
FROM mitarbeiter
WHERE mlohn*12 < 20000.00
	AND mabt_fk BETWEEN 10 AND 20
ORDER BY mlohn*12 DESC;

/*Aufg 6 a bis d*/
SELECT mname AS 'Name',
	(mlohn*12)+100 AS 'Jahreslohn'
FROM mitarbeiter
ORDER BY (mlohn*12)+100 DESC;

SELECT mname AS 'Name',
	TRUNCATE(mlohn + 100, 0) AS 'Monatslohn + 100',
	TRUNCATE((mlohn+100)*12, 0) AS 'Jahreslohn + 100 pro Monat'
FROM mitarbeiter
WHERE TRUNCATE((mlohn+100)*12, 0) BETWEEN 15000 AND 20000
ORDER BY TRUNCATE((mlohn+100)*12, 0) DESC;

SELECT mname AS 'Name',
	mlohn AS 'Monatslohn',
	mlohn+mprov AS 'Monatslohn + Provision'
FROM mitarbeiter
WHERE mabt_fk = 30
ORDER BY mlohn+mprov DESC;

SELECT mname AS 'Name',
	mlohn*12 AS 'Jahreslohn',
	CASE WHEN mprov IS NULL THEN TRUNCATE((12*mlohn)+0,0)
		ELSE truncate((12*mlohn)+mprov, 0) END AS 'Jahreslohn + Provision'
FROM mitarbeiter
ORDER BY mlohn+mprov DESC;

SELECT mname AS 'Mitarbeiter',
	mlohn AS 'Monatslohn',
	TRUNCATE(mlohn/12, 0) AS '1/12 Monatslohn',
	TRUNCATE(mlohn%12, 2) AS 'Rest der Division'
FROM mitarbeiter;

/*Aufg 7 a bis g*/

/*____________*/

/*Aufg 8 a bis d*/
SELECT mabt_fk AS 'Abt.-Nr.',
	mname AS 'Name',
	MAX(mlohn) AS 'hoechster Lohn'
FROM mitarbeiter
GROUP BY mabt_fk
ORDER BY mabt_fk;

SELECT mabt_fk AS 'Abt.-Nr.',
	mname AS 'Name',
	MAX(mlohn) AS 'hoechster Lohn',
	ROUND(AVG(mlohn), 2) AS 'Durchschnittslohn',
	COUNT(mname) AS 'Anzahl Mitarbeiter'
FROM mitarbeiter
GROUP BY mabt_fk
ORDER BY mabt_fk;

SELECT mabt_fk AS 'Abteilung',
CASE WHEN mprov IS NULL THEN "keine Provision"
	ELSE COUNT(mprov) END AS 'Provision'
FROM mitarbeiter
GROUP BY mabt_fk;

SELECT
	CASE WHEN SUM(12*mlohn)+SUM(mprov) IS NULL THEN SUM((12*mlohn)+0)
		ELSE SUM(12*mlohn)+SUM(mprov) END AS 'Lohnsumme alle'
FROM mitarbeiter;