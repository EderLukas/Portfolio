#!/bin/bash
# bash als Shell wurde verlangt

# ***********************************************************************************
#
# Prueft ob abgefragter Verzeichnisname bereits in Verzeichnis vorhanden ist. Wenn
# ja, user informieren und beenden. Wenn nein, Verzeichnis erstellen und beenden.
#
# -----------------------------------------------------------------------------------
#
# Autor: Lukas Eder			Erstelldatum: 29.01.2018
#
# -----------------------------------------------------------------------------------
#
# Revisionen:
# Autor:		Bemerkungen:			Signatur:
# xy			xyzz				20180108/led
#
# ***********************************************************************************


# ***********************************************************************************
# Deklaration der Variablen
  var_Source = "/home/scripts"
# ***********************************************************************************

clear
echo

echo "Bitte Verzeichnisnamen eingeben:"
read verzeichnisName

if [ ! -d /home/scripts/$verzeichnisName ]; then
	cd /home/scripts
	mkdir $verzeichnisName
	cd /home/scripts/$verzeichnisName
	echo
	pwd
	echo
	ls -al
	echo
	echo
else
	echo "Dieses Verzeichnis ist bereits vorhanden. Skript wird beendet."
	echo
	echo
fi
echo "script finished"

