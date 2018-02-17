# source code:      quick_draw.py
# date:             29.12.2017
# author:           Lukas Eder
#
# Descr.:
# Kurve zeichnen mittels matplot
# Kleines Projekt im Zuge eines Udemykurses

# Bibliothek importieren
import matplotlib.pyplot as plt


def main():

    # Listen fuer Koordinaten der Punkte
    xs = []
    ys = []

    # Listcomprehention: generieren der Koordinaten
    xs = [x/10 for x in range(101)]
    ys = [y**2 for y in xs]

    # Ausgabe der Grafik
    plt.plot(xs, ys)
    plt.show()


if __name__ == '__main__':
    main()