/*
source code:		zinsrechner.c
author:				Lukas Eder
date:				17.09.2017

Zweck:
�bung Zins und Zinseszins.
Schreibe ein Programm, dass das Guthaben eines Depositenkontos
nach einer bestimmten Anzahl Jahre berechnet.

Operationen:
- Eingabe des Kontoguthabens
- Eingabe des Zinssatzes (bleibt �ber Zeitspanne konstant)
- Eingabe der Jahre �ber die das Geld auf dem Konto liegt (nur ganze Jahre)
- Zinseszinsen m�ssen ber�cksichtigt werden
- Das Programm muss beliebig oft durchf�hrbar sein.
*/

#define _CRT_SECURE_NO_WARNINGS

#include <stdio.h>							// Bibliotheken
#include <float.h>

int main(void) {							// Init. Main

	double guthaben = 0;					// Variable Kontostand/Guthaben
	int jahre = 0;							// Variable f�r Zeitspanne/Jahre
	int zins = 0;							// Variable f�r Zins in Prozent
	double endbetrag = 0;					// Betrag auf Konto nach Zeitspanne (Resultat)
	char rep;								// Variable f�r Entscheid ob das Programm repetiert wird

	printf("Zinsrechner\n\n");				// Titel

	do {									// Wiedereintrittspunkt f�r Programmwiederholung

		printf("Geben Sie Ihr Kontostand ein: ");
		scanf("%lf", &guthaben);			// Eingabe des Kontostandes durch User
		while (getchar() != '\n');			// Tastaturpuffer leeren

		printf("Geben Sie die Zeitspanne in ganzen Jahren an, �ber die der Zins berrechnet werden soll: ");
		scanf("%d", &jahre);				// Eingabe der Zeitspanne durch User
		while (getchar() != '\n');			// Tastaturpuffer leeren

		printf("Geben Sie den Zinssatz an (Ohne Prozentzeichen, keine Nachkommastellen): ");
		scanf("%d", &zins);					// Eingabe des Zinssatzes durch User
		while (getchar() != '\n');			// Tastaturpuffer leeren
		
		// Berechnung des Zinssatz und Endbetrages bei mehr als 1 Jahr
		endbetrag = guthaben * ((1 + (zins / 100)) ^ jahre);
		 
		// Ausgabe des resultates auf Bildschirm
		printf("Der Kontoendstand betr�gt: %.4lf nach %d Jahren zu einen Zinssatz von %d Prozent.\n", endbetrag, jahre, zins);

		// Frage nach der Programmwiederholung
		printf("M�chten Sie eine weitere Berechnung anstellen?\n");
		printf("y f�r Ja und n f�r Nein.\n");
		scanf("%c", &rep);					// Entscheidung f�r Programmrepetition durch User
		while (getchar() != '\n');			// Tastaturpuffer leeren

	} while (rep == 'y');
	
	return 0;		// Void f�r Main
}