# source code:      binary_decoder.py
# author:           Lukas Eder
# date:             13.02.2018
#
# Descr.:
# Userinput wird von ASCII in binaere Byte-Strings gewandelt oder umgekehrt.


# Funktion Binaer zu Ascii
def bin_read(binCode):

    for line in file:
        line_split = line.strip('\n').split(",")
        if binCode == line_split[0]:
            file.seek(0)
            return line_split[1]


# Funktion Ascii zu Binaer
def ascii_read(word):
    for line in file:
        line_split = line.strip('\n').split(",")
        if word == line_split[1]:
            file.seek(0)
            return line_split[0]


rep = "Ja"

while rep == "Ja":
    file = open("PATH_PLACEHOLDER/binaer.txt", "r")

    # User input
    print("Bitte geben Sie einen mehrteiligen Binaer- oder ASCII-String ein.")
    eingabe = str(input("Eingabe: "))
    print("wollen Sie Binaer in Ascii (1) oder Ascii in Binaer (2) wandeln.")
    wahl = str(input("Eingabe: "))

    # processing
    if wahl == "1":
        eingabe_split = eingabe.split()
        for element in eingabe_split:
            temp1 = bin_read(element)
            print(temp1)

    elif wahl == "2":
        for element in eingabe:
            temp2 = ascii_read(element)
            print(temp2)

    else:
        print("Fehlerhafte Eingabe")

    file.close()

    print("Moechten Sie noch eine Eingabe taetigen?")
    rep = str(input("(Ja/Nein) Eingabe: "))

print("Bye")
