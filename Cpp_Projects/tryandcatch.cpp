/*
 * source code:		tryandcatch.cpp
 * author:			Lukas Eder
 * date:			01.01.2018
 *
 * Descr.:
 * Uebung zu try and catch Fehlerbehandlung inkl. inteligentem Array
*/

#include <iostream>
#include <array>
using namespace std;

int main() {
	//Variablen
	array<double, 3> preise;
	preise.at(0) = 1.45;
	preise.at(1) = 3.55;
	preise.at(2) = 5.25;

	for (unsigned int i = 0; i < preise.size(); i++) {
		try {
			cout << "Preise pos 1 mit []: " << preise[1] << endl;
			cout << "Preise pos 5 mit at()" << preise.at(5) << endl;
			cout << "Ende des Try-Blocks" << endl;
		}
		catch(exception &e){
			cout << "Fehler: " << e.what() << endl;
		}
	}
}