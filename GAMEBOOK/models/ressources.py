import pygame
from models.const import Const, Position

class Ressource(object):
	"""docstring for Ressources"""

	def __init__(self, name):
		self.caract = Const()
		self.const = Const()
		self.attr = self.caract.attr_ressources
		self.name = name
		self.value = self.attr[name]
		self.position = Position()
		
		self.nb = 1
		self.recoltable = True

	def __str__(self):
		return "{} x{}".format(self.name, self.nb)

	def stack(self,nb):
		for i in range(0,nb):
			self.nb += 1

	def add_position(self, case_x, case_y):
		self.position.case_x = case_x
		self.position.case_y = case_y

	def joueur_autour(self, joueur):
		if joueur.direction == joueur.sprite.droite:
			if self.position.case_x == joueur.case_x+1 and self.position.case_y == joueur.case_y:
				return True
		elif joueur.direction == joueur.sprite.gauche:
			if self.position.case_x == joueur.case_x-1 and self.position.case_y == joueur.case_y:
				return True
		elif joueur.direction == joueur.sprite.haut:
			if self.position.case_x == joueur.case_x and self.position.case_y == joueur.case_y-1:
				return True
		elif  joueur.direction == joueur.sprite.bas:
			if self.position.case_x == joueur.case_x and self.position.case_y == joueur.case_y+1:
				return True
		else:
			return False


class Bois(Ressource):

	def __init__(self, name):
		super().__init__(name)
		self.img = pygame.image.load(self.caract.img['bois']).convert_alpha()
		self.sprite = 'b'

class Poulet(Ressource):

	def __init__(self, name):
		super().__init__(name)
		self.img = pygame.image.load(self.caract.img['poulet']).convert_alpha()
		self.sprite = 'p'

class Poivron(Ressource):

	def __init__(self, name):
		super().__init__(name)
		self.img = pygame.image.load(self.caract.img['poivron']).convert_alpha()
		self.sprite = 'i'

class Oignon(Ressource):

	def __init__(self, name):
		super().__init__(name)
		self.img = pygame.image.load(self.caract.img['oignon']).convert_alpha()
		self.sprite = 'o'

class Curry(Ressource):

	def __init__(self, name):
		super().__init__(name)
		self.img = pygame.image.load(self.caract.img['curry']).convert_alpha()
		self.sprite = 'c'