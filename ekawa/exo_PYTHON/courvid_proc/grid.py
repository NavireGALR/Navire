import turtle	
import random

class Position(object):
	"""docstring for Position"""
	def __init__(self, x, y):
		self.x = x
		self.y = y

class Zone(object):
	"""docstring for Zone"""
	SIDE = 100

	def __init__(self):
		self.corner1 = 0
		self.corner2 = 0
		rand_num = random.randint(1,100)
		if rand_num in range(1,69):
			self.contamined = "green"
		else:
			self.contamined = "red"

	def drawZone(self):
		pos=turtle.pos()
		self.corner1 = Position(pos[0], pos[1])
		self.corner2 = Position(self.corner1.x +self.SIDE, self.corner1.y +self.SIDE)
		turtle.begin_fill()
		for i in range(4):
		    turtle.color('black', self.contamined)
		    turtle.forward(self.SIDE)
		    turtle.left(90)
		turtle.end_fill()

	def is_contamined(self):
		if self.contamined == "red":
			return True
		else:
			return False

	def has_player(self, player):
		if self.corner1.x <= player.corner1.x <= self.corner2.x and self.corner1.y <= player.corner1.y <= self.corner2.y:
			return True
		else:
			return False

	def has_bot(self, bot):
		if self.corner1.x <= bot.corner1.x <= self.corner2.x and self.corner1.y <= bot.corner1.y <= self.corner2.y:
			return True
		else:
			return False

	def has_trophy(self, trophy):
		if self.corner1.x <= trophy.corner1.x <= self.corner2.x and self.corner1.y <= trophy.corner1.y <= self.corner2.y:
			return True
		else:
			return False

class Grid(object):
	"""docstring for Grid"""
	GRID = []
	NB_ZONE = 5
	NB_ROW = 5
	LIST_ZONE = []

	def __init__(self, corner1, corner2):
		self.corner1 = corner1
		self.corner2 = corner2

	@classmethod
	def _createGrid(cls):
		corner1 = Position(-250,-250)
		corner2 = Position(250,250)
		cls.GRID = Grid(corner1, corner2)

	@classmethod
	def _drawGrid(cls):
		if not cls.GRID:
			cls._createGrid()

		turtle.speed(0)
		turtle.penup()
		turtle.setpos(cls.GRID.corner1.x, cls.GRID.corner1.y)
		turtle.pendown()
		
		for i in range(cls.NB_ROW):
			for i in range(cls.NB_ZONE):
				zone = Zone()
				zone.drawZone()
				cls.LIST_ZONE.append(zone)
				turtle.forward(zone.SIDE)
			turtle.penup()
			turtle.left(180)
			turtle.forward(cls.NB_ZONE * zone.SIDE)
			turtle.left(180)
			turtle.pendown()
			turtle.penup()
			turtle.left(90)
			turtle.forward(zone.SIDE)
			turtle.right(90)
			turtle.pendown()
		turtle.penup()
		turtle.right(90)
		turtle.forward(cls.NB_ROW * cls.NB_ZONE)
		turtle.left(90)
		turtle.pendown()
		