import pygame
from pygame.locals import * 
from models.parser import Parser

class Const(object):
	"""docstring for Caract"""
	def __init__(self):
		attr_perso = Parser.caract_from_json('json/attr_perso.json')
		attr_ressources = Parser.caract_from_json('json/attr_ressources.json')
		attr_sac = Parser.caract_from_json('json/attr_sac.json')
		img = Parser.caract_from_json('json/img.json')

		self.img = img[0]
		self.attr_perso = attr_perso[0]
		self.attr_ressources = attr_ressources[0]
		self.attr_sac = attr_sac[0]

		self.NB_SPRITE = 15
		self.TAILLE_SPRITE = 30
		self.COTE = self.NB_SPRITE * self.TAILLE_SPRITE
		self.TITRE = "Gamebook"
		self.OBSTACLE = ['b', 'c', 'o', 'p', 'i']
		self.NON_OBSTACLE = ['k']

class Sprite(object):
	"""docstring for Sprite"""
	def __init__(self, img):
		self.droite = pygame.image.load(img['sprite_droite']).convert_alpha()
		self.gauche = pygame.image.load(img['sprite_gauche']).convert_alpha()
		self.haut = pygame.image.load(img['sprite_haut']).convert_alpha()
		self.bas = pygame.image.load(img['sprite_bas']).convert_alpha()

class Position(object):
	"""docstring for Sprite"""
	def __init__(self):
		self.case_x = 0
		self.case_y = 0
		self.x = 0
		self.y = 0
		


		

		