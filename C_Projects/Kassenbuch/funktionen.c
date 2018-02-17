/*
source code:		funktionen.c
author:			Lukas Eder
date:			20.11.2017

Descr.:
Stellt die Funktionen fuer das Hauptprogramm kassenbuch.c zur Verfuegung.
*/

#define _CRT_SECURE_NO_WARNINGS
#include "funktionen.h"
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

//Funktionen

int zeigeMenue(void) {
	int eingabe = 0;

	printf("***MENUE***\n\n");
	printf("1\tBuchung anzeigen.\n");
	printf("2\tBuchung erfassen.\n");
	printf("3\tBuchung loeschen.\n");
	printf("4\tBeenden.\n\n");
	printf("Ihre Eingabe: ");
	scanf("%d", &eingabe);
	while (getchar() != '\n');

	return eingabe;
}

void zeigeBuchungen(t_buchung *liste, int anzahl) {
	int i = 0;

	for (i = 0; i < anzahl; i++) {
		printf("%-30s\t%.2lf\t%.2lf\n", (liste+i)->buchungstxt, (liste+i)->einnahme, (liste+i)->ausgabe);
	}
}


t_buchung * erfasseBuchung(t_buchung *liste, int *anzahl) {
	printf("Eingabe Buchungstext: ");
	scanf("%[^\n]", liste->buchungstxt);
	while (getchar() != '\n');

	printf("Eingabe Einnahme: ");
	scanf("%lf", &liste->einnahme);
	while (getchar() != '\n');

	printf("Eingabe Ausgabe: ");
	scanf("%lf", &liste->ausgabe);
	while (getchar() != '\n');

	return liste;
}


t_buchung * loescheBuchung(t_buchung *liste, int *anzahl) {
	char eingabe[50];

	printf("Welche Buchung moechten Sie loeschen: ");
	scanf("%[^\n]", &eingabe);

	return liste;
}
