/*
 * source code:		schleifen.cpp
 * date:			29.12.2017
 * author:			Lukas Eder
 *
 * Descr.:
 * Diverse Uebungen zu Schleifen 
 aus dem Buch: einstieg in C++, Kapitel 4, ISBN: 798-3-8362-4510-4
*/

#include <iostream>

using namespace std;

// Hauptprogramm
int main() {

	double num;

	// forloop
	cout << "Geben sie eine Zahl ein: " << endl;
	cin >> num;
	cout << "Multipliziere Zahl 1-5" << endl;

	for (int i = 1; i < 6; i++) {
		cout << "Multiplikator: " << i << " ergibt: " << i * num << endl;
	}

	// For in For Loop (EinmalEins)
	for (int i = 1; i <= 10; i++) {
		for (int z = 1; z <= 10; z++) {
			cout << i*z << "\t" << flush;
			if (z == 10) {
				cout << endl;
			}
		}
	}

	// Guess the number mit do-while-Schleife
	int number = 57, input = 0, counter = 0;

	cout << "Raten Sie die ungerade Zahl zwischen 50 und 60: " << endl;

	do {

		cout << "Ihre Eingabe: " << endl;
		cin >> input;
		
		if (input < 50) {
			cout << "Zahl ist zu klein." << endl;
			if (input % 2 == 0) {
				cout << "Zahl ist gerade." << endl;
			}
		}
		else if (input > 60) {
			cout << "Zahl ist zu gross." << endl;
			if (input % 2 == 0) {
				cout << "Zahl ist gerade." << endl;
			}
		}
		else {
			if (input % 2 == 0) {
				cout << "Zahl ist gerade." << endl;
			}
			else if (input != number) {
				cout << "Zahl ist nicht korrekt." << endl;
			}
		}
		counter++;
	} while (input != number);

	// output wenn richtig
	cout << "Korrekte Eingabe: " << input << "\nDas waren: " << counter << " Versuche." << endl;
}
