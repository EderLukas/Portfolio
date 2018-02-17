#!/bin/bash
# bash als Shell wurde verlangt

# ***********************************************************************************
#
# Erstellt unter /home/scripts das Verzeichnis Test. Darin wird die Datei testfile.sh
# ertellt. In das selbe Directory wird die Datei hosts aus etc/ reinkopiert. Dann
# wird der Inhalt des aktuellen Verzeichnisses ausgegeben.
#
# -----------------------------------------------------------------------------------
#
# Autor: Lukas Eder			Erstelldatum: 08.01.2018
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
# ***********************************************************************************

clear
mkdir /home/scripts/Test
cd Test
touch testfile.sh
cp /etc/hosts /home/scripts/Test
ls -la

