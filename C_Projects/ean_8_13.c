/*
source code:		ean_8_13.c
date:				22.10.2017
author:				Lukas Eder

Description:
Programm errechnet die EAN-Puefziffer fuer achtstelligen und 13-stelligen EAN-Code

Used datatypes:
-int
-chr
*/

#define _CRT_SECURE_NO_WARNINGS_

#include <stdio.h>


int main(void) {

	// Variablen
	int ean13[12] = {0,1,1,3,7,3,5,5,9,2,4,3};
	int qrSumEven = 0;
	int qrSumOdd = 0;
	int thirdStep = 0;
	int fourthStep = 0;
	int ctrlNum = 0;
	int c = 0;	// Loopvariable
	int d = 1;	// Loopvariable
	int e = 0;	// Loopvariable
	int y = 0;	// Loopvariable
	
	// Programmtitel
	printf("EAN-Pruefziffer Generator\n");
	printf("_________________________\n\n");

	// Berrechnung
	for (c = 0; c <= 11; c = c + 2) {
		qrSumEven = qrSumEven + ean13[c];
	}
	for (d = 1; d <= 11; d = d + 2) {
		qrSumOdd = qrSumOdd + ean13[d];
	}
	thirdStep = qrSumOdd * 3;
	fourthStep = qrSumEven + thirdStep;
	for (int e = fourthStep; e <= fourthStep + 10; e++) {
		if (e % 10 == 0) {
			ctrlNum = e - fourthStep;
			break;
		}
	}

	// Ausgabe auf Bilschirm
	for (int y = 0; y <= 11; y++) {
		printf("%d", ean13[y]);
	}
	printf("-%d\n\n", ctrlNum);
	return 0;
}