import turtle
import random

class Draw(object):
	def __init__(self):
		self.d = turtle.Turtle()
		self.d.ht()

	def drawObject(self, x, y, color, side):
		self.d.clear()
		self.d.speed(0)
		self.d.penup()
		self.d.setpos(x, y)
		self.d.begin_fill()
		for i in range(4):
		    self.d.color('black', color)
		    self.d.forward(side)
		    self.d.left(90)
		self.d.end_fill()
