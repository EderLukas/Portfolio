# source code:      fibonacci_OOPy
# author:           Lukas Eder
# date:             15.02.2018
#
# Descr.:
# Objektorientierter Ansatz zur Generierung der Fibonacci Zahlen.
# Hier werden die ersten 20 Zahlen der Fibonacci-Folge ausgegeben


class Fibonacci:
    # Eigenschaften erstellen
    def __init__(self):
        self.previous_number = 0
        self.current_number = 1

    # Methode um die naechste Zahl zu errechnen
    def next(self):
        temporary_current = self.current_number
        self.current_number = self.previous_number + self.current_number

        self.previous_number = temporary_current

    # Methoder zur ausgabe der Zahl
    def show_number(self):
        print(self.current_number)

# Hauptprogramm


if __name__ == '__main__':
    f = Fibonacci()

    for i in range(20):
        f.show_number()
        f.next()
