#
# source code:  calculator_OOP.py
# author:       Lukas Eder
# date:         08.02.2018
#
# Descr.:
# Ein Rechner nach dem HP-Rechner Modell
# der die Grundrechenoperationen +, - , * und / kann.
# Ein objektorientierter Ansatz.


# Hauptprogramm


# Erstellen der Klasse fuer die Rechenoperation
class Calculation:

    # Konstruktor fuer die Eigenschaften Variabel 1, Variable 2
    # und die Variabel fuer den Operator
    def __init__(self, var1, var2, operation):
        self.var1 = var1
        self.var2 = var2
        self.operation = operation
        self.result = 0.0

    # Wahl der Rechenoperation und generieren des Resultats
    def choose_operation(self):
        if self.operation == "+":
            self.result = self.var1 + self.var2

        elif self.operation == "-":
            self.result = self.var1 - self.var2

        elif self.operation == "*":
            self.result = self.var1 * self.var2

        elif self.operation == "/":
            # Errorhandling Division durch 0
            while self.var2 == 0:
                print("Division durch 0 nicht moeglich! \n" +
                      "Erneute Eingabe der Variabel 2:")
                self.var2 = float(input())

            self.result = self.var1 / self.var2

        else:
            print("Fehlerhafter Operator!")

    def print_result(self):
        print("Ihre Rechnung: {} {} =  {}".format(self.var1, self.var2, self.result))


# Titel
print("\n\n*** HP-Rechner ***\n" +
      " Die OOP-Version  ")

# Variabel fuer die Programmrepetition
rep = ''

while rep != 'n':
    # Variablen initialisieren

    # Input durch den User
    print("\nBitte geben Sie die erste Variabel ein: ")
    variabel1 = float(input())
    print("Bitte geben sie die zweite Variabel ein: ")
    variabel2 = float(input())
    print("Bitte geben Sie die Rechenoperation ein: ")
    operand = str(input())

    # Objekt generieren
    rechnung = Calculation(variabel1, variabel2, operand)

    # Berechnung
    rechnung.choose_operation()

    # Output Resultat
    rechnung.print_result()

    # Programmrepetition
    print("\nMoechten Sie noch eine Rechnung machen?\n" +
          "'j' fuer Ja\n" +
          "'n' fuer Nein")
    rep = str(input())

print("\nBye!")
