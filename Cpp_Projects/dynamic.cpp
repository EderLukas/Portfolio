/*
 * source code:		dynamic.cpp
 * author:			Lukas Eder
 * date:			02.01.2018
 *
 * Descr.:
 * Uebungen zu Feldern (staatisch/inteligent/variable Groesse etc.).
*/

#include <iostream>
#include <algorithm>
#include <vector>
using namespace std;

// Funktionen
void eingabe(double &inVar, vector<double> &inArray) {
	while (true) {
		//Input
		cout << "Geben Sie eine Zahl ein:" << endl;
		cin >> inVar;
		inArray.push_back(inVar);
		cout << "Noch eine Zahl? (1 = Ja, 0 = Nein)" << endl;
		cin >> inVar;
		if (inVar == 0) {
			break;
		}
	}
}
void ausgabe(const vector<double> &outArray) {
	// Output
	for (double element : outArray) {
		cout << element << endl;
	}
}

int main() {
	// Variablen
	double input = 0.0;
	vector<double> nums;

	// Input
	eingabe(input, nums);

	// Drehen
	reverse(nums.begin(), nums.end());

	// Output
	ausgabe(nums);
}