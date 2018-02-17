/*
source code		hpRechner5.c
author:			Lukas Eder
date:			17.09.2016

description:
Aufgabe HP-Rechner 5

- Addition, Subtraktion, Multiplikation und Division von Zahlen vom Typ float resp. double
- EingabeReihenfolge: Variable 1, Variable 2, Operator
- Divison durch Null wird abgefangen
- Weiterrechnen mit dem Resultat ist moeglich
*/

#define _CRT_SECURE_NO_WARNINGS

#include <stdio.h>				//Bibliotheken
#include <float.h>

int main(void) {

	double var1 = 0;			// Variable 1
	double var2 = 0;			// Variable 2
	double resultat = 0;		// Resultat
	unsigned char operation;	// Operator
	int abfrage = 1;			// Programmwiederhohlung
	int fehler;					// Flag, Fehler = 1, kein Fehler = 0

								// Titel
	printf("HP-Rechner 5\n\n");

	/*	Erste Programmausführung garantiert und
	Wiedereinstiegspunkt für grundsätzliche
	Programmwiederhohlung*/
	do {
		fehler = 0;									// Zurücksetzten des Fehlerflags für Resultatausgabe

		if (abfrage == 1) {							// Eingabe Variable 1 durch User, wenn keine Kettenrechnung
			printf("Eingabe der ersten Variable:");
			scanf("%lf", &var1);
			while (getchar() != '\n');				// Tastaturpuffer leeren
		}

		printf("Eingabe der zweiten Variable:");	// Eingabe Variable 2 durch User
		scanf("%lf", &var2);
		while (getchar() != '\n');					// Tastaturpuffer leeren

		printf("Eingabe des Operators:");			// Eingabe des Operators durch User
		scanf("%c", &operation);
		while (getchar() != '\n');					// Tastaturpuffer leeren

		switch (operation) {						// Entscheidung der verschieden Rechenoptionen
		case '+':
			resultat = var1 + var2;
			break;
		case '-':
			resultat = var1 - var2;
			break;
		case '*':
			resultat = var1 * var2;
			break;
		case '/':
			while (var2 == 0) {
				printf("Division durch 0 ist nicht möglich. Erneute Eingabe von zweiter Variable:");
				scanf("%lf", &var2);				// Erneute Eingabe von Variable 2
			}
			resultat = var1 / var2;
			break;
		default:
			printf("Error!\n");
			fehler = 1;
		}

		/*Ausgabe des Resultats aber nur,
		wenn der Switch fehlerfrei durchlaufen wurde.*/
		if (fehler == 0) {
			printf("Resultat von %lf %c %lf = %lf\n", var1, operation, var2, resultat);
		}

		/*	Frage nach dem weiteren Vorgehen. Entscheidung zwischen
		erneutem Ausführen des Programms, Kettenrechnung und
		Beenden des Programms.*/
		printf("Weitere Optionen:\n");
		printf("Eingabe: 1 für eine weitere Rechnung.\n");
		printf("Eingabe: 2 für Weiternutzung des vorgegangenen Resultats (Kettenrechnung).\n");
		printf("Eingabe: 0 für Beenden des Programms.\n");

		scanf("%d", &abfrage);						// Eingabe der Entscheidung durch User
		while (getchar() != '\n');					// Tastaturpuffer leeren

		if (abfrage == 2) {							// Setzen der Variable 1 für Kettenrechnung
			var1 = resultat;
		}

	} while (abfrage > 0);							// Wiederholung des gesammten Programms

	return 0;		// Void für Main
}