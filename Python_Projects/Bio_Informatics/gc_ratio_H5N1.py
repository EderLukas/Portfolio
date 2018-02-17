# source code:      gc_ratio_H5N1.py
# author:           Lukas Eder
# date:             30.07.2017
#
# Descr.:
# Programm errechnet den GC-Gehalt des Influenza-A-Virus H5N1
# (Vogelgrippe/RNA-Virus).


# Hauptprogramm
def program():

    # Oeffnet das CDS-File und liest es
    gene = 'PATH_PLACEHOLDER/H5N1.txt'
    file = open(gene, newline='')

    letters = []                    # Generiere Buchstaben-Cashe

    file.readline()                 # Ueberspringe die erste Zeile

    for line in file:               # Liest die Buchstaben im File und
        for char in line:           # fügt diese dem Cashe zu.
            letters.append(char)

    tuple(letters)                  # Erstellt tuple aus Cashe fuer effizientere Bearbeitung
    g = letters.count('G')          # Zähle und generiere Platzhalter
    c = letters.count('C')          # für die Anzahl der jeweiligen Buchstaben.
    t = letters.count('T')
    a = letters.count('A')

    # Berechne die Endwerte
    gc_val_percentage = float(g + c) / float((g + c + a + t)) * 100
    at_val_percentage = float(100 - gc_val_percentage)

    # Output
    print("""
    AY576382.2 Influenza A virus (A/Gs/HK/739.2/02 (H5N1))
    polymerase (PB2) gene, partial cds""")
    print(100*'-')
    print('amount of G :', g)
    print('amount of C :', c)
    print('amount of A :', a)
    print('amount of T :', t)
    print()
    print('GC value :', gc_val_percentage, '%')
    print('AT value :', at_val_percentage, '%')


if __name__ == '__main__':
    program()
