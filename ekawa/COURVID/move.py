import turtle
import random
import subject

from event import *
from grid import *

class Move(object):

	def __init__(self):
		self.e = Event()
		
	def up(self, sub):
		sub.corner1 = Position(sub.corner1.x, sub.corner1.y + Zone.SIDE)
		sub.corner2 = Position(sub.corner1.x + sub.SIDE, sub.corner1.y + sub.SIDE)
		if isinstance(sub, subject.Player) and self.e.is_in_grid(sub) and not self.e.too_close(sub):
			self.e.getEvent(sub)
			sub.drawSubject()
		elif isinstance(sub, subject.Bot) and self.e.is_in_grid(sub):
			sub.drawSubject()
		else: 
			sub.corner1 = Position(sub.corner1.x, sub.corner1.y - Zone.SIDE)
			sub.corner2 = Position(sub.corner1.x + sub.SIDE, sub.corner1.y + sub.SIDE)

	def down(self, sub):
		sub.corner1 = Position(sub.corner1.x, sub.corner1.y - Zone.SIDE)
		sub.corner2 = Position(sub.corner1.x + sub.SIDE, sub.corner1.y + sub.SIDE)
		if isinstance(sub, subject.Player) and self.e.is_in_grid(sub) and not self.e.too_close(sub):
			self.e.getEvent(sub)
			sub.drawSubject()
		elif isinstance(sub, subject.Bot) and self.e.is_in_grid(sub):
			sub.drawSubject()
		else: 
			sub.corner1 = Position(sub.corner1.x, sub.corner1.y + Zone.SIDE)
			sub.corner2 = Position(sub.corner1.x + sub.SIDE, sub.corner1.y + sub.SIDE)

	def left(self, sub):
		sub.corner1 = Position(sub.corner1.x - Zone.SIDE, sub.corner1.y)
		sub.corner2 = Position(sub.corner1.x + sub.SIDE, sub.corner1.y + sub.SIDE)
		if isinstance(sub, subject.Player) and self.e.is_in_grid(sub) and not self.e.too_close(sub):
			self.e.getEvent(sub)
			sub.drawSubject()
		elif isinstance(sub, subject.Bot) and self.e.is_in_grid(sub):
			sub.drawSubject()
		else: 
			sub.corner1 = Position(sub.corner1.x + Zone.SIDE, sub.corner1.y)
			sub.corner2 = Position(sub.corner1.x + sub.SIDE, sub.corner1.y + sub.SIDE)

	def right(self, sub):
		sub.corner1 = Position(sub.corner1.x + Zone.SIDE, sub.corner1.y)
		sub.corner2 = Position(sub.corner1.x + sub.SIDE, sub.corner1.y + sub.SIDE)
		if isinstance(sub, subject.Player) and self.e.is_in_grid(sub) and not self.e.too_close(sub):
			self.e.getEvent(sub)
			sub.drawSubject()
		elif isinstance(sub, subject.Bot) and self.e.is_in_grid(sub):
			sub.drawSubject()
		else: 
			sub.corner1 = Position(sub.corner1.x - Zone.SIDE, sub.corner1.y)
			sub.corner2 = Position(sub.corner1.x + sub.SIDE, sub.corner1.y + sub.SIDE)
		