#!/bin/bash
# bash als Shell wurde verlangt

# ***********************************************************************************
#
# Demonstriert die Schnittfunktionen an Variablen
#
# -----------------------------------------------------------------------------------
#
# Autor: Lukas Eder			Erstelldatum: 29.01.2018
#
# -----------------------------------------------------------------------------------
#
# Revisionen:
# Autor:		Bemerkungen:			Signatur:
# Lukas Eder		xyzz				20180129/led
#
# ***********************************************************************************


# ***********************************************************************************
# Deklaration der Variablen
  var_Source = "/home/scripts/"
  var_Pfadname="/home/scripts/backup/backup1.sh"
# ***********************************************************************************

clear
echo "Original:				$var_Pfadname"
echo
echo "{var_Pfadname%/*}			${var_Pfadname%/*}"
echo "{var_Pfadname%backup*}			${var_Pfadname%backup*}"
echo "{var_Pfadname%scripts*}			${var_Pfadname%scripts*}"
echo "{var_Pfadname%%backup*}			${var_Pfadname%%backup*}"
echo "{var_Pfadname%%script*}			${var_Pfadname%%scripts*}"
echo 
echo "{var_Pfadname#*backup}			${var_Pfadname#*backup}"
echo "{var_Pfadname#*script}			${var_Pfadname#*script}"
echo "var_Pfadname##*/}			${var_Pfadname##*/}"
echo "var_Pfadname##*backup}			${var_Pfadname##*backup}"
echo "var_Pfadname##*scripts}			${var_Pfadname##*scripts}"
echo
