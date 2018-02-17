/*
source code:	temperaturStatistik.c
author:			Lukas Eder
date:			29.10.2017

Description:
Uebung Temperatur-Statistik. Aufbereiten von Daten 
mittels Array und diverse Berechungen.

Used Datatypes:
-int
-double
-char
*/

#define _CRT_SECURE_NO_WARNINGS

// Bibliotheken
#include <stdio.h>
#include <time.h>

int main(void) {

	// Variablen
	double temp[6];
	int timeH[6];
	int timeMin[6];
	double tempAvr = 0;
	double tempMin = 0;
	double tempMax = 0;
	double tempSum = 0;
	double tempEingabe = 0;
	int timeEingabe = 0;
	char progRep = 'n';
	int loopWrite = 0;
	int loop1 = 0;
	int loop2 = 0;
	int loop3 = 0;
	int loopRead = 0;

	// Titel
	printf("***** Temperatur-Statistik *****\n\n");
	printf("Es sind maximal sechs Temperaturen einzugeben.\n\n");

	do {
		// Array einlesen der Temparaturen
		for (loopWrite = 0; loopWrite <= 5; loopWrite++) {
			printf(" Uhrzeit => Stunden der %d-ten Eingabe: ", loopWrite + 1);
			scanf("%d", &timeEingabe);
			timeH[loopWrite] = timeEingabe;
			while (getchar() != '\n');

			printf(" Uhrzeit => Minuten der %d-ten Eingabe: ", loopWrite + 1);
			scanf("%d", &timeEingabe);
			timeMin[loopWrite] = timeEingabe;
			while (getchar() != '\n');

			printf("Geben Sie die %d-te Temperatur ein (0.00): ", loopWrite + 1);
			scanf("%lf", &tempEingabe);
			temp[loopWrite] = tempEingabe;
			while (getchar() != '\n');
		}

		// Durchschnitt berechnen
		for (loop1 = 0; loop1 <= 5; loop1++) {
			tempSum = tempSum + temp[loop1];
		}
		tempAvr = tempSum / 6;

		// Minimalwert finden
		tempMin = temp[0];
		for (loop2 = 0; loop2 <= 5; loop2++) {
			if (temp[loop2] < tempMin) {
				tempMin = temp[loop2];
			}

		}

		//Maximalwert finden
		tempMax = temp[0];
		for (loop3 = 0; loop3 <= 5; loop3++) {
			if (temp[loop3] > tempMax) {
				tempMax = temp[loop3];
			}
		}

		// Ausgabe auf Bildschirm
		printf("\n\nTemperatur-Statistik\n");
		printf("--------------------\n\n");
		printf("Zeit\t\tTemperatur\n");
		for (loopRead = 0; loopRead <= 5; loopRead++) {
			printf("%02d:%02d\t\t%.2lf\n", timeH[loopRead], timeMin[loopRead], temp[loopRead]);
		}
		printf("Durchschnittstemperatur: %.2lf\n", tempAvr);
		printf("Niedrigste Temperatur: %.2lf\n", tempMin);
		printf("Hoechste Temparatur: %.2lf\n\n", tempMax);


		// Programmrepetion
		printf("Moechten sie noch eine Eingabe taetigen?\n");
		printf("'j' fuer Ja und 'n' fuer Nein\n");
		printf("Ihre Eingabe: ");
		scanf("%c", &progRep);
		printf("\n\n");
		while (getchar() != '\n');
	} while (progRep == 'j');

	printf("Beenden... Auf Wiedersehen!\n\n");

	return 0;
}