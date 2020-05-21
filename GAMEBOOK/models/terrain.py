import pygame
from pygame.locals import * 
from constantes import *



class Foret:
	"""Classe permettant de créer un niveau"""
	def __init__(self, fichier):
		self.fichier = fichier
		self.structure = 0
	
	
	def generer(self):
		with open(self.fichier, "r") as fichier:
			structure_niveau = []
			for ligne in fichier:
				ligne_niveau = []
				for sprite in ligne:
					if sprite != '\n':
						ligne_niveau.append(sprite)
				structure_niveau.append(ligne_niveau)
			self.structure = structure_niveau
	
	
	def afficher(self, fenetre):
		"""Méthode permettant d'afficher le niveau en fonction 
		de la liste de structure renvoyée par generer()"""
		#Chargement des images (seule celle d'arrivée contient de la transparence)
		bois = pygame.image.load("img/bois.png").convert_alpha()
		debut = pygame.image.load("img/debut.png").convert()
		mort = pygame.image.load("img/mort.png").convert_alpha()
		
		#On parcourt la liste du niveau
		num_ligne = 0
		for ligne in self.structure:
			#On parcourt les listes de lignes
			num_case = 0
			for sprite in ligne:
				#On calcule la position réelle en pixels
				x = num_case * taille_sprite
				y = num_ligne * taille_sprite
				if sprite == 'b':		   #b = Bois
					fenetre.blit(bois, (x,y))
				elif sprite == 'd':		   #d = Départ
					fenetre.blit(debut, (x,y))
				elif sprite == 'm':		   #m = Mort
					fenetre.blit(mort, (x,y))
				num_case += 1
			num_ligne += 1
			