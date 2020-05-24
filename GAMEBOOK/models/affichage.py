import pygame
from pygame.locals import *
from models.personnage import Joueur
from models.terrain import Foret
from models.const import Const

class Affichage(object):
	"""docstring for Affichage
	
	init : pygame windows

	"""
	GAME = False
	ACCUEIL = True
	CONTINUER = True

	def __init__(self):
		self.const = Const()
		self.img = self.const.img

		self.fenetre = pygame.display.set_mode((self.const.COTE, self.const.COTE))
		self.icone = pygame.image.load(self.img['sprite_droite'])
		self.img_acc = pygame.image.load(self.img['accueil']).convert()
		self.bg = pygame.image.load(self.img['fond']).convert()
		self.map = "img/map"
		self.map_init = "img/map_init"

		pygame.display.set_icon(self.icone)
		pygame.display.set_caption(self.const.TITRE)
		
		
	def start(self):
		pygame.time.Clock().tick(30)
		self.fenetre.blit(self.img_acc, (0,0))
		pygame.display.flip()

	def quitter(self):
		self.GAME = False
		self.ACCUEIL = False
		self.CONTINUER = False

	def accueil(self):
		for event in pygame.event.get():
			if event.type == QUIT or event.type == KEYDOWN and event.key == K_ESCAPE:
				self.quitter()	
			elif event.type == KEYDOWN:
				self.generer_niveau(self.map_init)
				self.ACCUEIL = False
				self.GAME = True

	def generer_niveau(self, map):
		self.niveau = Foret(map, self.fenetre) #Condition en fonction de @p terrain
		self.joueur = Joueur('Ekawa', self.niveau)	#Condition en fonction de @p Joueur
		self.niveau.nouveau_terrain()		

	def jeu(self):
		pygame.time.Clock().tick(30)
		for event in pygame.event.get():
			if event.type == QUIT:
				self.quitter()
			elif event.type == KEYDOWN:
				if event.key == K_ESCAPE:
					self.ACCUEIL = True
					self.GAME = False	
				elif event.key == K_RIGHT:
					self.joueur.deplacer('droite')
				elif event.key == K_LEFT:
					self.joueur.deplacer('gauche')
				elif event.key == K_UP:
					self.joueur.deplacer('haut')
				elif event.key == K_DOWN:
					self.joueur.deplacer('bas')	
				elif event.key == K_e:
					self.joueur.recolter(self.niveau)	

			
		#Affichages aux nouvelles positions
		self.fenetre.blit(self.bg, (0,0))
		self.niveau.afficher(self.map)
		self.fenetre.blit(self.joueur.direction, (self.joueur.x, self.joueur.y)) #moi.direction = l'image dans la bonne direction
		pygame.display.flip()

		#Victoire -> Retour à l'accueil
		if self.niveau.structure[self.joueur.case_y][self.joueur.case_x] == 'm':
			self.ACCUEIL = True
			self.GAME = False	


	




		