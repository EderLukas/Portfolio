/*Übersicht anzeigen*/
SELECT * FROM songs;
SELECT * FROM album;
SELECT * FROM artist;

/*Abfragen mit diversen JOIN*/
SELECT songs.title 'Titel',
	artist.name 'Interpret',
	album.title 'Album',
	album.price 'Preis',
	DATE_FORMAT(album.publ_date, "%d.%m.%Y") 'Erscheinungsdatum'
FROM songs
/*INNER*/JOIN artist, album
	WHERE songs.artist_fk=artist.artist_pk AND songs.album_fk=album.album_pk
ORDER BY album.publ_date;

SELECT album.title 'Album',
	album.price 'Preis',
	album.publ_date 'Erscheinungsdatum',
	artist.name 'Interpret'
FROM album
LEFT JOIN artist
	ON album.artist_fk=artist.artist_pk
ORDER BY album.publ_date DESC;

SELECT album.title 'Album',
	album.price 'Preis',
	album.publ_date 'Erscheinungsdatum',
	artist.name 'Interpret'
FROM album
RIGHT JOIN artist
	ON album.artist_fk=artist.artist_pk
ORDER BY album.publ_date DESC;

/*Abfragen mit SUBQUERIES*/
SELECT title 'Titel'
FROM songs
WHERE album_fk IN
	(SELECT album_pk FROM album
	WHERE price > 25.6);

/*SUBQUERY in gleicher Tabelle können alle Atribute verwendet werden*/
SELECT title 'Album'
FROM album
WHERE price >
	(SELECT AVG(price) FROM album);

/*SUBQUERY über mehrere Tabellen geht nur mit Verbindung über PK-FK*/
SELECT title 'Titel'
FROM songs
WHERE album_fk=
	(SELECT MIN(album_pk) FROM album);

/*Abfragen mit UNION, die abgefragten Attribute müssen identisch von iherer Art (description) sein*/
SELECT album_fk 'Album_fk aus songs'
FROM songs
UNION
SELECT album_pk 'PK aus album'
FROM album;


/*WHERE Abfrage über mehrere Tabellen (JOIN-Ersatz)*/
SELECT songs.title 'Titel',
	songs.song_pk 'Titel-ID',
	album.title 'Album'
FROM songs, album
WHERE songs.album_fk=album.album_pk;

/*Abfragen mit HAVING, die Having-klausel muss im slect verwendet werden.*/
SELECT songs.title 'Titel',
	songs.song_pk 'Titel-ID',
	album.title 'Album',
	album.album_pk 'Album-ID'
FROM songs
INNER JOIN album
ON songs.album_fk=album.album_pk
GROUP BY songs.song_pk
HAVING songs.song_pk > AVG(album.album_pk)
ORDER BY album.title;