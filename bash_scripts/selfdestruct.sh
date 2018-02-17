#!/bin/bash
# bash als Shell wurde verlangt

# ***********************************************************************************
#
# Mini-Game, Ueben von If-Else Entscheidungen und Schleifen
#
# -----------------------------------------------------------------------------------
#
# Autor: Lukas Eder			Erstelldatum: 05.02.2018
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
echo "You are standing in front of a read box"
echo
echo
echo
echo "________________________________________"
echo "*		  	      	       *"
echo "*				       *"
echo "*                                      *"
echo "*              Caution                 *"
echo "*      This is the Selfdestruction     *"
echo "*             Comand-Box               *"
echo "*                                      *"
echo "*                                      *"
echo "*                                      *"
echo "*______________________________________*"

echo
echo "Would you like to open the box?"
read descision

if [ $descision = "Yes" ]; then
  echo
  echo "."
  sleep 1
  echo ".."
  sleep 1
  echo "..."
  sleep 3
  echo "initialising...."
  sleep 2
  echo "preparing protocols..."
  sleep 2
  echo
  echo "System ready. Would you like to execute the selfdestruction?"
  read descision2

  if [ $descision2 = "Yes" ]; then
    sleep 2
    echo
    echo "Understood"
    sleep 1
    echo  "Initialising self destruction protocols"
    sleep 2
    echo "System: stable"
    sleep 2
    echo "Estimated time of detonation: T - 30 seconds"
    stime=`date +%s`
    sleep 1
    echo
    
      while [ "$((`date +%s` - $stime))" != "30" ]; do
        if [ "$((`date +%s` - $stime))" == "25" ]; then
          echo "5 seconds remaining"
        fi
        if [ "$((`date +%s`- $stime))" == "20" ]; then
          echo "10 seconds remaining"
        fi
        if [ "$((`date +%s` - $stime))" == "10" ]; then
          echo "20 seconds remaining"
        fi
       sleep 1
      done
      
      echo
      echo
      echo "**************************************************"
      echo "*****************BOOOOOOOOOOOOOM******************"
      echo "**************************************************"
      echo
      echo
      init 0
      exit 0
      
  fi
  sleep 2
  echo "Please close the box."
  sleep 2
  echo "script finished"
  exit 0
  
fi
sleep 2
echo "You leave the box as it is"
sleep 2
echo "script finished"
exit 0
