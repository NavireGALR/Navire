import turtle
import random

from functools import partial
from grid import *
from draw import *
from move import *

class Player(object):

	MARGIN = 33
	SIDE = 33

	def __init__(self):
		self.corner1 = Position(Grid.GRID.corner1.x + self.MARGIN, Grid.GRID.corner1.y + self.MARGIN)
		self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)
		self.color = "blue"
		self.infected = 0
		self.d = Draw()
		move = Move()
		self.up = partial(move.up, self)
		self.down = partial(move.down, self)
		self.left = partial(move.left, self)
		self.right = partial(move.right, self)

	def drawSubject(self):
		self.d.drawObject(self.corner1.x, self.corner1.y, self.color, self.SIDE)

	def movePlayer(self):
		turtle.listen()
		turtle.onkey(self.up, 'Up')
		turtle.onkey(self.down, 'Down')
		turtle.onkey(self.left, 'Left')
		turtle.onkey(self.right, 'Right')

		
class Trophy(object):
	MARGIN = 66
	SIDE = 33

	def __init__(self):
		self.corner1 = Position(Grid.GRID.corner2.x - self.MARGIN, Grid.GRID.corner2.y - self.MARGIN)
		self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)
		self.color = "yellow"
		self.d = Draw()

	def drawSubject(self):
		self.d.drawObject(self.corner1.x, self.corner1.y, self.color, self.SIDE)


class Bot(object):
	MARGIN = 66
	SIDE = 33
	LIST_BOT = []

	def __init__(self):
		random_zone = random.randint(0,len(Grid.LIST_ZONE)-1)
		self.corner1 = Position(Grid.LIST_ZONE[random_zone].corner2.x- self.MARGIN, Grid.LIST_ZONE[random_zone].corner1.y - self.MARGIN)
		self.corner2 = Position(self.corner1.x + self.SIDE, self.corner1.y + self.SIDE)
		self.color = "purple"
		self.d = Draw()
		self.LIST_BOT.append(self)
		self.move = Move()

	def drawSubject(self):
		self.d.drawObject(self.corner1.x, self.corner1.y, self.color, self.SIDE)	

	def moveBot(self):
		rand = random.randint(1,4)
		if rand == 1:
			self.move.up(self)
		if rand == 2:
			self.move.down(self)
		if rand == 3:
			self.move.left(self)
		if rand == 4:
			self.move.right(self)



	

