/*
sourcecode:		kassenbuch.c
author:			Lukas Eder
date:			20.11.2017

Descr.:
Es ist ein Programm zu entwickeln, welches ein Kassenbuch verwaltet.
*/

#define _CRT_SECURE_NO_WARNINGS

#include "funktionen.h"

#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int main(void){
	int wahl = 0;				//Menuepunkt_Wahl des Benutzers
	t_buchung *liste = NULL;	//Pointer auf das Array
	int anzahl = 0;				//Anzahl Werte im Array

	/*Fuer die Luafversuche
	**3 datensaetze in die Liste einfuegen
	**Nach den Laufversuchen ist dieser Block zu loeschen
	*/

	liste = (t_buchung *)malloc(sizeof(t_buchung));
	strcpy(liste->buchungstxt, "Uebertrag vom Vorjahr");
	liste->einnahme = 111;
	liste->ausgabe = 0;
	anzahl++;

	liste = (t_buchung *)malloc(sizeof(t_buchung));
	strcpy((liste + anzahl)->buchungstxt, "Bueromaterial");
	// oder: strcpy(liste[anzahl]).buchungstxt, "Bueromatieral");
	(liste + anzahl)->einnahme = 0;
	// oder: liste[anzah].einnahme = 0;
	(liste + anzahl)->ausgabe = 22;
	// oder: liste[anzahl].ausgabe = 22;
	anzahl++;

	while (wahl != 4) {
		// Menue aufbauen und die Wahl des Benutzers abfragen
		wahl = zeigeMenue();

		switch (wahl) {
		case 1:
			//Liste am Bildschirm ausgeben
			zeigeBuchungen(liste, anzahl);
			break;
		case 2:
			// Neuen Eintrag hinzufuegen
			liste = erfasseBuchung(liste, &anzahl);
			break;
		case 3:
			// Einen Eintrag loeschen
			liste = loescheBuchung(liste, &anzahl);
		}
	}

	return 0;
}