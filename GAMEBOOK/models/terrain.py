import pygame
from pygame.locals import * 
from models.ressources import *
from models.const import Position, Const

class Terrain(object):
	"""docstring for Terrain"""
	
	NB_SPRITE = 15
	TAILLE_SPRITE = 30

	def __init__(self, map, fenetre):
		self.debut = pygame.image.load("img/debut.png").convert()
		self.mort = pygame.image.load("img/mort.png").convert_alpha()
		self.map = 'img/map'
		self.map_init = 'img/map_init'
		self.fenetre = fenetre
		self.structure = []
		self.position = Position()
		self.const = Const()
		self.img = self.const.img
		self.objet_choisi = None


	def nouveau_terrain(self):
		self.afficher(self.map_init)
		self.save_objets()
		
	def generer(self, map):
		with open(map, "r") as f:
			structure_niveau = []
			for ligne in f:
				ligne_niveau = []
				for sprite in ligne:
					if sprite != '\n':
						ligne_niveau.append(sprite)
				structure_niveau.append(ligne_niveau)
			self.structure = structure_niveau

	def save_objets(self):
		num_ligne = 0
		for ligne in self.structure:
			num_case = 0
			for sprite in ligne:
				x = num_case * self.TAILLE_SPRITE
				y = num_ligne * self.TAILLE_SPRITE
				if sprite == 'd':		   #d = Départ
					pass #add objet to list
				elif sprite == 'm':		   #m = Mort
					pass #add objet to list
				num_case += 1
			num_ligne += 1

	def afficher(self, map):
		self.modif_terrain()
		self.generer(map)
		num_ligne = 0
		for ligne in self.structure:
			num_case = 0
			for sprite in ligne:
				x = num_case * self.TAILLE_SPRITE
				y = num_ligne * self.TAILLE_SPRITE
				if sprite == 'd':		   #d = Départ
					self.fenetre.blit(self.debut, (x,y))
				elif sprite == 'm':		   #m = Mort
					self.fenetre.blit(self.mort, (x,y))
				num_case += 1
			num_ligne += 1

	def modif_terrain(self, ressources_terrain):
		with open(self.map, "w") as f:
			for y in range(0, self.const.NB_SPRITE):
				for x in range(0, self.const.NB_SPRITE):
					dans_condi = False
					for obj in ressources_terrain:
						if obj.position.case_x == x and obj.position.case_y == y:
							f.write(obj.sprite)
							dans_condi = True
							break
					if not dans_condi:
						f.write('0')
				f.write('\n')
	
	def get_obstacle(self, joueur, ressources_terrain):
		self.objet_choisi = None
		for objet in ressources_terrain:
			if objet.joueur_autour(joueur) and objet.recoltable:
				self.objet_choisi = objet
				id_objet = ressources_terrain.index(objet)
				del ressources_terrain[id_objet]
		return self.objet_choisi
		

class Foret(Terrain):
	"""Classe permettant de créer un niveau de type forêt"""
	
	def __init__(self, map, fenetre):
		super().__init__(map, fenetre)
		self.ressources_foret = []
		self.bois = Bois('bois')
		self.oignon = Oignon('oignon')
		self.curry = Curry('curry')
		self.poulet = Poulet('poulet')
		self.poivron = Poivron('poivron')
		
	def afficher(self, map):
		super().afficher(map)
		num_ligne = 0
		for ligne in self.structure:
			num_case = 0
			for sprite in ligne:
				x = num_case * self.TAILLE_SPRITE
				y = num_ligne * self.TAILLE_SPRITE
				if sprite == 'b':		   #'b = Bois
					self.fenetre.blit(self.bois.img, (x,y))
				elif sprite == 'o':		   #o = Oignon
					self.fenetre.blit(self.oignon.img, (x,y))
				elif sprite == 'c':		   #c = Curry
					self.fenetre.blit(self.curry.img, (x,y))
				elif sprite == 'p':		   #p = Poulet
					self.fenetre.blit(self.poulet.img, (x,y))
				elif sprite == 'i':		   #i = Poivron
					self.fenetre.blit(self.poivron.img, (x,y))
				num_case += 1
			num_ligne += 1

	def save_objets(self):
		super().save_objets()
		num_ligne = 0
		for ligne in self.structure:
			num_case = 0
			for sprite in ligne:
				x = num_case * self.TAILLE_SPRITE
				y = num_ligne * self.TAILLE_SPRITE
				if sprite == 'b':		   #'b = Bois
					bois = Bois('bois')
					bois.add_position(num_case, num_ligne)
					self.ressources_foret.append(bois)
				elif sprite == 'o':		   #o = Oignon
					oignon = Oignon('oignon')
					oignon.add_position(num_case, num_ligne)
					self.ressources_foret.append(oignon)
				elif sprite == 'c':		   #c = Curry
					curry = Curry('curry')
					curry.add_position(num_case, num_ligne)
					self.ressources_foret.append(curry)
				elif sprite == 'p':		   #p = Poulet
					poulet = Poulet('poulet')
					poulet.add_position(num_case, num_ligne)
					self.ressources_foret.append(poulet)
				elif sprite == 'i':		   #i = Poivron
					poivron = Poivron('poivron')
					poivron.add_position(num_case, num_ligne)
					self.ressources_foret.append(poivron)
				
				num_case += 1
			num_ligne += 1

	def get_obstacle(self, joueur):
		super().get_obstacle(joueur, self.ressources_foret)

	def modif_terrain(self):
		super().modif_terrain(self.ressources_foret)



		
		




	




		
		
			