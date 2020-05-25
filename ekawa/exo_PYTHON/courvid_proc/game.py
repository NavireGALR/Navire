import turtle
import random
from tkinter import *
from grid import *


class Player(object):
	"""docstring for Player"""
	MARGIN = 33
	SIDE = 33

	def __init__(self):
		self.corner1 = Position(Grid.GRID.corner1.x + self.MARGIN, Grid.GRID.corner1.y + self.MARGIN)
		self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)
		self.color = "blue"
		self.infected = 0
		self.playerTurtle = turtle.Turtle()
		self.playerTurtle.ht()

	def drawPlayer(self):
		self.playerTurtle.clear()
		self.playerTurtle.speed(0)
		self.playerTurtle.penup()
		self.playerTurtle.setpos(self.corner1.x, self.corner1.y)
		self.playerTurtle.begin_fill()
		for i in range(4):
		    self.playerTurtle.color('black', self.color)
		    self.playerTurtle.forward(self.SIDE)
		    self.playerTurtle.left(90)
		self.playerTurtle.end_fill()

	def movePlayer(self):
		turtle.listen()
		turtle.onkey(self.up, 'z')
		turtle.onkey(self.down, 's')
		turtle.onkey(self.left, 'q')
		turtle.onkey(self.right, 'd')

	def inGrid(self):
		if Grid.GRID.corner1.x <= self.corner1.x <= Grid.GRID.corner2.x and Grid.GRID.corner1.y <= self.corner1.y <= Grid.GRID.corner2.y:
			return True 
		else:
			return False
	
	def up(self):
		self.corner1 = Position(self.corner1.x, self.corner1.y + Zone.SIDE)
		self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)
		is_bot = False
		for i in range (len(Grid.LIST_ZONE)):
			for y in range (len(Bot.LIST_BOT)):
				if Grid.LIST_ZONE[i].has_bot(Bot.LIST_BOT[y]) and Grid.LIST_ZONE[i].has_player(self):
					is_bot = True
		if self.inGrid() and not is_bot:
			notify()
			event(self)
			self.drawPlayer()
		else: 
			self.corner1 = Position(self.corner1.x, self.corner1.y - Zone.SIDE)
			self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)

	def down(self):
		self.corner1 = Position(self.corner1.x, self.corner1.y - Zone.SIDE)
		self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)
		is_bot = False
		for i in range (len(Grid.LIST_ZONE)):
			for y in range (len(Bot.LIST_BOT)):
				if Grid.LIST_ZONE[i].has_bot(Bot.LIST_BOT[y]) and Grid.LIST_ZONE[i].has_player(self):
					is_bot = True
		if self.inGrid() and not is_bot:
			notify()
			event(self)
			self.drawPlayer()
		else: 
			self.corner1 = Position(self.corner1.x, self.corner1.y + Zone.SIDE)
			self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)

	def left(self):
		self.corner1 = Position(self.corner1.x - Zone.SIDE, self.corner1.y)
		self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)
		is_bot = False
		for i in range (len(Grid.LIST_ZONE)):
			for y in range (len(Bot.LIST_BOT)):
				if Grid.LIST_ZONE[i].has_bot(Bot.LIST_BOT[y]) and Grid.LIST_ZONE[i].has_player(self):
					is_bot = True
		if self.inGrid() and not is_bot:
			notify()
			event(self)
			self.drawPlayer()
		else: 
			self.corner1 = Position(self.corner1.x + Zone.SIDE, self.corner1.y)
			self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)

	def right(self):
		self.corner1 = Position(self.corner1.x + Zone.SIDE, self.corner1.y)
		self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)
		is_bot = False
		for i in range (len(Grid.LIST_ZONE)):
			for y in range (len(Bot.LIST_BOT)):
				if Grid.LIST_ZONE[i].has_bot(Bot.LIST_BOT[y]) and Grid.LIST_ZONE[i].has_player(self):
					is_bot = True
		if self.inGrid() and not is_bot:
			notify()
			event(self)
			self.drawPlayer()
		else: 
			self.corner1 = Position(self.corner1.x - Zone.SIDE, self.corner1.y)
			self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)

		
class Trophy(object):
	"""docstring for Trophy"""

	MARGIN = 66
	SIDE = 33

	def __init__(self):
		self.corner1 = Position(Grid.GRID.corner2.x - self.MARGIN, Grid.GRID.corner2.y - self.MARGIN)
		self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)
		self.color = "yellow"
		self.trophyTurtle = turtle.Turtle()
		self.trophyTurtle.ht()

	def drawTrophy(self):
		self.trophyTurtle.speed(0)
		self.trophyTurtle.penup()
		self.trophyTurtle.setpos(self.corner1.x, self.corner1.y)
		self.trophyTurtle.begin_fill()
		for i in range(4):
		    self.trophyTurtle.color('black', self.color)
		    self.trophyTurtle.forward(self.SIDE)
		    self.trophyTurtle.left(90)
		self.trophyTurtle.end_fill()



class Bot(object):
	"""docstring for Bot"""

	MARGIN = 66
	SIDE = 33
	LIST_BOT = []

	def __init__(self):
		random_zone = random.randint(0,len(Grid.LIST_ZONE)-1)
		self.corner1 = Position(Grid.LIST_ZONE[random_zone].corner2.x- self.MARGIN, Grid.LIST_ZONE[random_zone].corner1.y - self.MARGIN)
		self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)
		self.color = "purple"
		self.botTurtle = turtle.Turtle()
		self.botTurtle.ht()
		self.LIST_BOT.append(self)

	def drawBot(self):
		self.botTurtle.speed(0)
		self.botTurtle.clear()
		self.botTurtle.penup()
		self.botTurtle.setpos(self.corner1.x, self.corner1.y)
		self.botTurtle.begin_fill()
		for i in range(4):
		    self.botTurtle.color('black', self.color)
		    self.botTurtle.forward(self.SIDE)
		    self.botTurtle.left(90)
		self.botTurtle.end_fill()
		

	def moveBot(self):
		rand = random.randint(1,4)
		if rand == 1:
			self.up()
		if rand == 2:
			self.down()
		if rand == 3:
			self.left()
		if rand == 4:
			self.right()

	def inGrid(self):
		if Grid.GRID.corner1.x <= self.corner1.x <= Grid.GRID.corner2.x and Grid.GRID.corner1.y <= self.corner1.y <= Grid.GRID.corner2.y:
			return True 
		else:
			return False
	
	def up(self):
		self.corner1 = Position(self.corner1.x, self.corner1.y + Zone.SIDE)
		self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)
		if self.inGrid():
			self.drawBot()
		else: 
			self.corner1 = Position(self.corner1.x, self.corner1.y - Zone.SIDE)
			self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)

	def down(self):
		self.corner1 = Position(self.corner1.x, self.corner1.y - Zone.SIDE)
		self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)
		if self.inGrid():
			self.drawBot()
		else: 
			self.corner1 = Position(self.corner1.x, self.corner1.y + Zone.SIDE)
			self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)

	def left(self):
		self.corner1 = Position(self.corner1.x - Zone.SIDE, self.corner1.y)
		self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)
		if self.inGrid():
			self.drawBot()
		else: 
			self.corner1 = Position(self.corner1.x + Zone.SIDE, self.corner1.y)
			self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)

	def right(self):
		self.corner1 = Position(self.corner1.x + Zone.SIDE, self.corner1.y)
		self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)
		if self.inGrid():
			self.drawBot()
		else: 
			self.corner1 = Position(self.corner1.x - Zone.SIDE, self.corner1.y)
			self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)


########## GAME #################
		
def event(player):
	trophy = Trophy()
	for i in range(len(Grid.LIST_ZONE)):	
		if Grid.LIST_ZONE[i].has_player(player) and Grid.LIST_ZONE[i].is_contamined():
			player.color = "orange"
			player.infected += 1
			print(player.infected)	
			if player.infected > 2:
				player.color = "black"
		if Grid.LIST_ZONE[i].has_player(player) and Grid.LIST_ZONE[i].has_trophy(trophy):
			if player.infected <= 2:
				print("Win !")
			else:
				print("Vous êtes trop infecté, recommencez !")
		for y in range(len(Bot.LIST_BOT)):
			if Grid.LIST_ZONE[i].has_bot(Bot.LIST_BOT[y]) and Grid.LIST_ZONE[i].has_trophy(trophy):
				print("Perdu !")


def notify():
	for i in range(len(Bot.LIST_BOT)):
		Bot.LIST_BOT[i].moveBot()



def mainLoop():
	turtle.ht()
	Grid._drawGrid()
	player = Player()
	trophy = Trophy()
	trophy.drawTrophy()
	player.drawPlayer()
	for i in range(6):
		bot = Bot()
		bot.drawBot()

	player.movePlayer()
	print()
	turtle.done()

if __name__ == '__main__':
    mainLoop()
