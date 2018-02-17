/*
 * source code:		pointer.cpp
 * author:			Lukas Eder
 * date:			01.01.2018
 *
 * Descr.:
 * Pointerspielereien
*/

#include<iostream>
using namespace std;

int main() {
	
	int a = 2, b = 3;
	int *pa, *pb;
	pa = &a;
	pb = &b;
	
	cout << "Normale Ausgabe\n"
		<< "Variablen a & b:\t\t" << a << ' ' << b << '\n'
		<< "Variablen Referenzen (&var):\t" << &a << ' ' << &b << '\n'
		<< "Variablen Pointer:\t\t" << pa << ' ' << pb << '\n' << endl;

	*pa += 1;
	*pb += 1;

	cout << "Ausgabe nach +1 auf dereferenzierten Pointer\n"
		<< "Variablen a & b:\t\t" << a << ' ' << b << '\n'
		<< "Variablen Referenzen (&var):\t" << &a << ' ' << &b << '\n'
		<< "Variablen Pointer:\t\t" << pa << ' ' << pb << '\n' << endl;
}