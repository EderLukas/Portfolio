#!/bin/bash
# bash als Shell wurde verlangt

# ***********************************************************************************
#
# Kopiert den Header aus header.sh, nimmt den ersten Parameter als Dateiname, wendet
# chmod 744 für die Berechtigungen an und oeffnet die Datei im nano.
#
# -----------------------------------------------------------------------------------
#
# Autor: Lukas Eder			Erstelldatum: 29.01.2018
#
# -----------------------------------------------------------------------------------
#
# Revisionen:
# Autor:		Bemerkungen:			Signatur:
# Lukas Eder		Header eingefügt		20180129/led
#
# ***********************************************************************************


# ***********************************************************************************
# Deklaration der Variablen
  var_Source = "/home/scripts"
  dateiname=${1%.sh}
# ***********************************************************************************

cp /home/scripts/header.sh /home/scripts/$dateiname.sh
chmod 744 /home/scripts/$dateiname.sh
nano /home/scripts/$dateiname.sh
