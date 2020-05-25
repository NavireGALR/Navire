import grid
import subject

import turtle
import random


def mainLoop():
	turtle.ht() #hide turtle
	#rules
	print("""
		Vous êtes le carré Bleu en bas à droite. Utilisez les flèches du clavier pour vous déplacer.
		Le but est d'atteindre le carré Jaune représentant un vaccin contre le covid.
		Vous ne pouvez pas vous retrouvez sur la même case qu'un infecté (en Violet)
		Chaque passage dans une zone contaminée (en Rouge) augmente votre infection de 1.
		A 3 d'infection, vous avez perdu.
		Si un infecté atteint le vaccin avant vous, vous avez perdu.
		Bonne chance ! 
		""")
	#create Grid, player and Trophy
	grid.Grid._drawGrid()
	player = subject.Player()
	trophy = subject.Trophy()
	
	#Draw subject
	trophy.drawSubject()
	player.drawSubject()
	for i in range(3):
		bot = subject.Bot()
		bot.drawSubject()

	#Allow to move player
	player.movePlayer()
	turtle.done()

if __name__ == '__main__':
    mainLoop()
