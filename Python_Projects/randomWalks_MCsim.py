# source code:      randomWalks_MCsim.py
# author:           Lukas Eder
# date:             15.06.2017
#
# Descr.:
# Basiert auf dem Socratia Tutorial:
# https://www.youtube.com/watch?v=BfS2H1y6tzQ&index=20&list=PLi01XoE8jYohWFPpC17Z-wWhPOSuh8Er-
#
# Angenommen wir haben eine Stadt mit quadratischen Blocks und Strassennetz.
# Wie viele zufaellige Richtungswechsel kann ich an jeder Kreuzung machen, sodass
# ich am Ende im Durchschnitt 5 Blocks von meinem Startpunkt aus entfernt bin?

# Bibliothek importieren
import random


# Zufallsfunktion
def random_walk_2(n):
    """Koordinaten nach 'n' gelaufenen Bloecken retournieren."""
    x, y = 0, 0
    for i in range(n):
        (dx, dy) = random.choice([(0, 1), (0, -1), (1, 0), (-1, 0)])
        x += dx
        y += dy
    return x, y


# Monte-Carlo Simulation

number_of_walks = 20000

# Ein 'Walk' ist zwischen 1 bis 30 Blocks lang
for walk_length in range(1, 31):
    # Anzahl von gelaufenen Blocken die 4 oder weniger von Startpunkt entfernt sind.
    no_transport = 0

    # Es werden 'number_of_walks' Durchlaeufe der Simulation gemacht
    for i in range(number_of_walks):
        # Random Walk mit walk_length ausfuehren
        (x, y) = random_walk_2(walk_length)
        # Entfernung von Startpunkt berechnen
        distance = abs(x) + abs(y)

        # Zaehler erhoehen, wenn wir weniger als 5 Blocks vom Startpunkt entfernt sind.
        if distance <= 5:
            no_transport += 1

    # Wahrscheinlichkeit des Erfolgs (5 oder weniger Blocks von Startpunkt) berechnen
    no_transport_percentage = float(no_transport) / number_of_walks
    print('Walk size = ', walk_length,' / % of no transport = ', 100*no_transport_percentage)
