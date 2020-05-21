import pygame
from pygame.locals import *
from models.personnage import Personnage
from models.terrain import Foret

class Affichage(object):
	"""docstring for Affichage
	
	init : pygame windows

	"""
	NB_SPRITE = 15
	TAILLE_SPRITE = 30
	COTE = NB_SPRITE * TAILLE_SPRITE
	TITRE = "Gamebook"
	IMG_ICONE = "img/moi_droite.png"
	IMG_ACCEUIL = "img/accueil.png"
	IMG_BG = "img/fond.jpg"
	IMG_BOIS = "img/bois.png"
	IMG_START = "img/debut.png"
	IMG_DEATH = "img/mort.png"

	def __init__(self):
		self.fenetre = pygame.display.set_mode((self.COTE, self.COTE))
		self.icone = pygame.image.load(self.IMG_ICONE)
		self.img_acc = pygame.image.load(self.IMG_ACCEUIL).convert()
		self.map = "img/map"
		self.bg = pygame.image.load(self.IMG_BG).convert()
		self.fenetre.blit(self.img_acc, (0,0))

		self.continuer_accueil = 1
		self.continuer_jeu = 1
		self.continuer = 1
		self.choix = 1
		

	def start(self):
		pygame.display.set_icon(self.icone)
		pygame.display.set_caption(self.TITRE)
		pygame.time.Clock().tick(30)
		pygame.display.flip()

		return self.continuer

	def acceuil(self):
		while self.continuer_accueil:
			for event in pygame.event.get():
				if event.type == QUIT or event.type == KEYDOWN and event.key == K_ESCAPE:
					self.quitter()	
				elif event.type == KEYDOWN:				
					self.continuer_accueil = 0	
					self.generer_niveau(self.map)

		return self.continuer	

	def jeu(self):
		while self.continuer_jeu:
			#Limitation de vitesse de la boucle
			pygame.time.Clock().tick(30)
			for event in pygame.event.get():
				if event.type == QUIT:
					self.quitter()
				elif event.type == KEYDOWN:
					if event.key == K_ESCAPE:
						self.continuer_jeu = 0
					elif event.key == K_RIGHT:
						self.joueur.deplacer('droite')
					elif event.key == K_LEFT:
						self.joueur.deplacer('gauche')
					elif event.key == K_UP:
						self.joueur.deplacer('haut')
					elif event.key == K_DOWN:
						self.joueur.deplacer('bas')			
				
			#Affichages aux nouvelles positions
			self.fenetre.blit(self.bg, (0,0))
			self.niveau.afficher(self.fenetre)
			self.fenetre.blit(self.joueur.direction, (self.joueur.x, self.joueur.y)) #dk.direction = l'image dans la bonne direction
			pygame.display.flip()

			#Victoire -> Retour à l'accueil
			if self.niveau.structure[self.joueur.case_y][self.joueur.case_x] == 'a':
				self.continuer_jeu = 0

			return self.continuer
		
	def generer_niveau(self, map):
		self.niveau = Foret(map) #Condition en fonction de @p terrain
		self.niveau.generer()
		self.niveau.afficher(self.fenetre)
		self.joueur = Personnage("img/moi_droite.png", "img/moi_gauche.png", "img/moi_haut.png", "img/moi_bas.png", self.niveau)

	def quitter(self):
		self.continuer_accueil = 0
		self.continuer_jeu = 0
		self.continuer = 0
		self.choix = 0	




		