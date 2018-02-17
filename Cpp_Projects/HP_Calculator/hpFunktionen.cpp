/*
 * sorce code:		hpFunktionen.cpp
 * author:			Lukas Eder
 * date:			28.12.2017
 *
 * Descr.:
 * Resscourcefile mit den Funktionen fuer Berechnungen Addition, Subtraktion, Multiplikation
 * und Division sowie die Menuefunktion fuer das Hauptprogramm hp_rechner.cpp
*/

#include "hpFunktionen.h"
#include <iostream>

using namespace std;

//Berechnungen
double addition(double var1, double var2) {
	return var1 + var2;
}

double subtraktion(double var1, double var2) {
	return var1 - var2;
}

double multiplikation(double var1, double var2) {
	return var1 * var2;
}

double division(double var1, double &var2) {
	if (var2 == 0) {
		cout << "Division durch 0 nicht moeglich!\n"
			<< "Eingabe der 2 Variable: " << endl;
		cin >> var2;
	}
	return var1 / var2;
}

//Menuefunktion
char menue(char entscheidung) {
	cout << "*** MENUE ***" << endl;
	cout << "+\tAddition\n"
		<< "-\tSubtraktion\n"
		<< "*\tMultiplikation\n"
		<< "/\tDivision\n\n"
		<< "Ihre Wahl:" << endl;
	cin >> entscheidung;
	return entscheidung;
}