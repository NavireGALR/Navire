import pygame
from models.const import Const

class Ressource(object):
	"""docstring for Ressources"""

	SPRITE = []

	def __init__(self, name):
		self.caract = Const()
		self.attr = self.caract.attr_ressources
		self.name = name
		self.SPRITE = ['b', 'c', 'o', 'p', 'i']
		self.x = 0
		self.y = 0
		#self.value = self.attr[name]
		self.nb = 0

	def __str__(self):
		return self.name

	def stack(self,nb):
		for i in range(1,nb):
			self.nb += 1

class Bois(Ressource):

	def __init__(self, name):
		super().__init__(name)
		self.img = pygame.image.load(self.caract.img['bois']).convert_alpha()
		self.recoltable = True
		self.sprite = 'b'

class Poulet(Ressource):

	def __init__(self, name):
		super().__init__(name)
		self.img = pygame.image.load(self.caract.img['poulet']).convert_alpha()
		self.recoltable = True
		self.sprite = 'p'

class Poivron(Ressource):

	def __init__(self, name):
		super().__init__(name)
		self.img = pygame.image.load(self.caract.img['poivron']).convert_alpha()
		self.recoltable = True
		self.sprite = 'i'

class Oignon(Ressource):

	def __init__(self, name):
		super().__init__(name)
		self.img = pygame.image.load(self.caract.img['oignon']).convert_alpha()
		self.recoltable = True
		self.sprite = 'o'

class Curry(Ressource):

	def __init__(self, name):
		super().__init__(name)
		self.img = pygame.image.load(self.caract.img['curry']).convert_alpha()
		self.recoltable = True
		self.sprite = 'c'