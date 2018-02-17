/*
source code:		cafeteria3.c
author:				Lukas Eder
date:				17.11.2017

descr.:
sortiert die Fileausgabe der Aufgabe Cafeteria
mittels Bubblesort.
*/

#define _CRT_SECURE_NO_WARNINGS
#include <stdio.h>
#include <stdlib.h>

//Struct
struct artikel_t {
	char name[31];
	int kategorie;
	double preis;
};

struct firstline_t {
	char name[25];
	char kategorie[25];
	char preis[100];
};

//Functions
void sortPrice(struct artikel_t arr[], struct artikel_t temp[], int *sumData) {
	
	//Variablen
	int i;			//loop
	int getauscht;	//flag
	int count = *sumData;

	//Bublesort auf Preis der Datenseatze in sturct array
	do {
		count--;
		getauscht = 0;

		for (i = 0; i < count; i++) {
			if (arr[i].preis > arr[i + 1].preis) {
				temp[0] = arr[i];
				arr[i] = arr[i + 1];
				arr[i + 1] = temp[0];
				getauscht = 1;
			}
		}
	}while(getauscht && count > 1);
}

//Main
int main(void) {

	//Variablen
	struct artikel_t artikel[101];
	struct artikel_t temp[3];
	struct firstline_t fline;
	int lc = 0;
	int *ptr_lc;

	//Filestreams
	FILE*myFile = NULL;
	FILE*newFile = NULL;

	//Oeffnen des Referenzfiles
	myFile = fopen("artikel.txt", "r");
	
	//Lesen der ersten Zeile
	fscanf(myFile, "%[^\t]\t%[^\t]\t%[^\n]\n", &fline.name, &fline.kategorie, &fline.preis);
	//Lesen der Datensaetze und verpacken in "Container"
	do {
		fscanf(myFile, "%[^\t]\t%d\t%lf\n", &artikel[lc].name, &artikel[lc].kategorie, &artikel[lc].preis);
		lc++;
	} while (!feof(myFile));
	//Referenzfile schliessen
	fclose(myFile);

	//Datensaetze sortieren
	ptr_lc = &lc;
	sortPrice(artikel, temp, ptr_lc);

	//Neues File oeffen
	newFile = fopen("Artikel_sortiert.txt", "w");

	//erste Zeile schreiben
	fprintf(newFile, "%-25s\t%s\t%s\n\n", fline.name, fline.kategorie, fline.preis);
	//Sortierte Datensaetze in neues File uebertragen
	for (int i = 0; i < lc; i++) {
		fprintf(newFile, "%-25s\t%d\t\t%.2lf\n", artikel[i].name, artikel[i].kategorie, artikel[i].preis);
	}

	//INFO auf screen
	printf("finished\n");
	return 0;
}