# -*- coding: utf8 -*-

import random
import json
 


def getListFromJson(file, key):
    values=[]
    with open(file) as f:
        data = json.load(f)
        for entry in data:
            values.append(entry[key])
    return values

def getRandom(myList):
    random_index = random.randint(0, len(myList)-1)
    return myList[random_index]

def cleanSentence(quote, char):
    quote.strip()
    char.capitalize()
    quote = "{} aurait dit : \"{}\"".format(char,quote)
    return quote

def getQuote():
    listQuotes = getListFromJson('quotes.json', 'quote')
    listChar = getListFromJson("characters.json", 'character')
    random_quote = getRandom(listQuotes)
    random_char = getRandom(listChar)
    return cleanSentence(random_quote, random_char)

def mainLoop():
    while True:
        user_input = input("S pour Stop, Q pour une citation aléatoire !").upper()
        if user_input == "Q":
            print(getQuote())
        elif user_input == "S":
            break


if __name__ == '__main__':
    mainLoop()