import pygame
from pygame.locals import * 
from models.ressources import *

class Terrain(object):
	"""docstring for Terrain"""
	
	NB_SPRITE = 15
	TAILLE_SPRITE = 30

	def __init__(self, map):
		self.debut = pygame.image.load("img/debut.png").convert()
		self.mort = pygame.image.load("img/mort.png").convert_alpha()
		self.map = map
		self.structure = []

	def generer(self):
		with open(self.map, "r") as f:
			structure_niveau = []
			for ligne in f:
				ligne_niveau = []
				for sprite in ligne:
					if sprite != '\n':
						ligne_niveau.append(sprite)
				structure_niveau.append(ligne_niveau)
			self.structure = structure_niveau

	def afficher(self, fenetre):
		num_ligne = 0
		for ligne in self.structure:
			num_case = 0
			for sprite in ligne:
				x = num_case * self.TAILLE_SPRITE
				y = num_ligne * self.TAILLE_SPRITE
				if sprite == 'd':		   #d = Départ
					fenetre.blit(self.debut, (x,y))
				elif sprite == 'm':		   #m = Mort
					fenetre.blit(self.mort, (x,y))
				num_case += 1
			num_ligne += 1
		

class Foret(Terrain):
	"""Classe permettant de créer un niveau de type forêt"""
	
	def __init__(self, map):
		super().__init__(map)
		self.bois = Bois('Arbre')
		self.oignon = Oignon('Oignon')
		self.curry = Curry('Curry')
		self.poivron = Poivron('Poivron')
		self.poulet = Poulet('Poulet')

		
		
	def afficher(self, fenetre):
		super().afficher(fenetre)
		num_ligne = 0
		for ligne in self.structure:
			num_case = 0
			for sprite in ligne:
				x = num_case * self.TAILLE_SPRITE
				y = num_ligne * self.TAILLE_SPRITE
				if sprite == 'b':		   #b = Bois
					fenetre.blit(self.bois, (x,y))
				elif sprite == 'o':		   #o = Oignon
					fenetre.blit(self.oignon, (x,y))
				elif sprite == 'c':		   #c = Curry
					fenetre.blit(self.curry, (x,y))
				elif sprite == 'p':		   #p = Poulet
					fenetre.blit(self.poulet, (x,y))
				elif sprite == 'i':		   #i = Poivron
					fenetre.blit(self.poivron, (x,y))
				
				num_case += 1
			num_ligne += 1
		


		
		
			