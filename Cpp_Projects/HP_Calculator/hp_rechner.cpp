/*
 * source code:		hp_rechner.cpp
 * author:			Lukas Eder
 * date:			28.12.2017
 *
 * Descr.:
 * Grundlegende Rechnungen von Addition, Subtraktion, Multiplikation und Division nach dem HP-Rechner-Model.
*/

#include "hpFunktionen.h"
#include <iostream>

using namespace std;

// Hauptprogramm

int main() {

	// Variablen
	double resultat = 0.0, input1 = 0.0, input2 = 0.0;
	char menu = ' ', rep = ' ';

	// Titel
	cout << "***** HP-RECHNER *****\n" << endl;

	do {
		menu = menue(menu);

		// Input durch user

		if (rep == 'c') {
			input1 = resultat;
		}
		else {
			cout << "\nVariable 1:" << endl;
			cin >> input1;
		}

		cout << "Variable 2:" << endl;
		cin >> input2;

		// Berechnungen
		switch (menu) {
		case '+':
			resultat = addition(input1, input2);
			break;
		case '-':
			resultat = subtraktion(input1, input2);
			break;
		case '*':
			resultat = multiplikation(input1, input2);
			break;
		case '/':
			resultat = division(input1, input2);
			break;
		default:
			cout << "ERROR!" << endl;
			break;
		}

		// Output
		cout << "\n"
		<< input1 << " " << menu << " " << input2 << " = " << resultat << endl;

		//Programmrepetition
		cout << "\n"
			<< "y\tNeue Rechnung\n"
			<< "c\tmit altem Resultat fortfahren\n"
			<< "q\tBeenden\n\n"
			<<"Ihre Wahl:" << endl;
		cin >> rep;

	} while (rep != 'q');

	cout << "\nWiedersehen!" << endl;
}