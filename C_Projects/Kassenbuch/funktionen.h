/*
source code:	funktionen.h
author:			Lukas Eder
date:			20.11.2017

Descr.:
Projekt "Kassenbuch" - Deklarationen
*/

#define _CRT_SECURE_NO_WARNINGS

//Structs
typedef struct buchung_t {
	char buchungstxt[31];
	double einnahme;
	double ausgabe;
}t_buchung;

//Funktionsprototypen
int zeigeMenue(void);
void zeigeBuchungen(t_buchung *, int);
t_buchung * erfasseBuchung(t_buchung *, int *);
t_buchung * loescheBuchung(t_buchung *, int *);
