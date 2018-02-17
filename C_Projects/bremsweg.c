/*
source code:		bremsweg.c
author:				Lukas Eder
date:				28.10.2017

Zweck:
Berechnung der Anhaltestrecke eines Autos bei trockener, nasser Fahrbahn und bei Glatteis.

Operationen:
- Eingabe Geschwindigkeit in km/h durch User
- Eingabe Fahrbahnzustand durch User
- Berechnung der Anhaltestrecke
- Ausgabe auf Bildschirm
- Frage nach Programmrepetition
*/

#define _CRT_SECURE_NO_WARNINGS

#include <stdio.h>				// Bibliotheken
#include <float.h>
#include <math.h>

int main(void) {				// Init. Main

	double speed = 0;			// Variable für Geschwindigkeit in km/h
	double bremsweg = 0;		// Variable für den Bremsweg (Resultats-Variable)
	int road = 0;				// Variable für Zustand der Strasse
	char progRep = 'n';

	// Titel
	printf("Berechnung des Bremsweges\n\n");

	do {
		// Eingabe der Variable für Geschwindigkeit durch User
		printf("Geben Sie die Geschwindigkeit des Autos ein (km/h): ");
		scanf("%lf", &speed);
		while (getchar() != '\n');	// Tastaturpuffer leeren

		speed = speed * 1000 / 3600; // Wandelt die Eingabe (km/h) in (m/s)

									 // Entscheidung des Strassenzustands durch User
		printf("Geben Sie den Zustand der Strasse ein.\n");
		printf("1 für eine trockene Stasse.\n");
		printf("2 für eine nasse Strasse.\n");
		printf("3 für Glatteis auf der Strasse.\n");
		printf("Ihre Eingabe: ");
		scanf("%d", &road);
		while (getchar() != '\n');	// Tastaturpuffer leeren

		switch (road) {
		case 1:
			bremsweg = pow(speed,2)/(2*7.5);
			break;
		case 2:
			bremsweg = pow(speed,2)/(2*5.5);
			break;
		case 3:
			bremsweg = pow(speed,2)/(2*1);
			break;
		default:
			printf("ERROR \n\n");
			break;
		}

		//Bildschirmausgabe
		printf("Der Bremsweg betraegt: %.4lf Meter.\n\n", bremsweg);

		//Programmwiederholung
		printf("Moechten Sie eine weitere Berrechnung machen?\n");
		printf("'y' fuer Ja und 'n' fuer Nein.\n");
		printf("Ihre Eingabe: ");
		scanf("%c", &progRep);
		while (getchar() != '\n');

	} while (progRep == 'y');

	printf("Beenden... Kommen Sie gut nach Hause!\n\n");

	return 0;				// Void für Main
}