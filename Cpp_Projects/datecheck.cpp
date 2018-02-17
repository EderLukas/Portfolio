/*
 * source code:		dateckeck.cpp
 * author:			Lukas Eder
 * date:			29.12.2017
 *
 * Descr.:
 * User gibt Datum ein und Programm prueft es auf seine Richtigkeit.
*/

#include <iostream>
using namespace std;

// Hauptprogramm

int main() {
	// Variablen
	int jahr, monat, tag;

	// Eingabe
	cout << "Geben Sie das Jahr ein: " << endl;
	cin >> jahr;
	cout << "Geben sie den Monat ein: " << endl;
	cin >> monat;
	cout << "Geben Sie den Tag ein (ohne vorstehendes Null): " << endl;
	cin >> tag;

	// Pruefe Monat, Jahr
	if (jahr %4 == 0 and jahr % 100 != 0 and jahr % 400 != 0) {
		switch (monat) {
		case 2:
			if (tag > 29) {
				cout << "Ihr Datum (TT.MM.JJJJ): " << tag << "." << monat << "." << jahr << '\n' 
				<< "ungueltiges Datum, Schaltjahr" << endl;
			}
			else {
				cout << "valides Datum" << endl;
			}
			break;
		case 1:
		case 3:
		case 5:
		case 7:
		case 8:
		case 10:
		case 12:
			if (tag > 31) {
				cout << "ungueltiges Datum" << endl;
			}
			else {
				cout << "valides Datum" << endl;
			}

			break;
		case 4:
		case 6:
		case 9:
		case 11:
			if (tag > 30) {
				cout << "ungueltiges Datum" << endl;
			}
			else {
				cout << "valides Datum" << endl;
			}

			break;
		default:
			cout << "ERROR!" << endl;
			break;
		}
	}
	else {
		switch (monat) {
		case 2:
			if (tag > 28) {
				cout << "ungueltiges Datum" << endl;
			}
			else {
				cout << "valides Datum" << endl;
			}
			break;
		case 1:
		case 3:
		case 5:
		case 7:
		case 8:
		case 10:
		case 12:
			if (tag > 31) {
				cout << "ungueltiges Datum" << endl;
			}
			else {
				cout << "valides Datum" << endl;
			}

			break;
		case 4:
		case 6:
		case 9:
		case 11:
			if (tag > 30) {
				cout << "falsches Datum" << endl;
			}
			else {
				cout << "valides Datum" << endl;
			}

			break;
		default:
			cout << "ERROR!" << endl;
			break;
		}
	}
}