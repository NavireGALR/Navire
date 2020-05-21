import pygame
from models.const import Const

class Ressource(object):
	"""docstring for Ressources"""

	def __init__(self, name):
		self.caract = Const()
		self.attr = self.caract.attr_ressources
		self.name = name
		#self.value = self.attr[name]
		self.nb = 0

	def stack(self,nb):
		for i in range(1,nb):
			self.nb += 1

class Bois(Ressource):

	def __init__(self, name):
		super().__init__(name)
		self.img = pygame.image.load(self.caract.img['bois']).convert_alpha()
		self.recoltable = True
