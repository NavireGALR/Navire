import pygame
from pygame.locals import *
from const import *

pygame.init()

#Ouverture de la fenêtre Pygame
screen = pygame.display.set_mode((450, 450), RESIZABLE)

#BOUCLE PRINCIPALE
continuer = 1
while continuer:

	#Rafraichissement
	pygame.display.flip()

	#On remet ces variables à 1 à chaque tour de boucle
	continuer_jeu = 1
	continuer_accueil = 1

	#BOUCLE D'ACCUEIL
	while continuer_accueil:
		#Limitation de vitesse de la boucle
		pygame.time.Clock().tick(30)
	
		for event in pygame.event.get():
		
			#Si l'utilisateur quitte, on met les variables 
			#de boucle à 0 pour n'en parcourir aucune et fermer
			if event.type == QUIT or event.type == KEYDOWN and event.key == K_ESCAPE:
				continuer_accueil = 0
				continuer_jeu = 0
				continuer = 0
				#Variable de choix
				choix = 0

			elif event.type == KEYDOWN:				
				continuer_accueil = 0	#On quitte l'accueil
				choix = 'images/jeu'		#On définit le niveau à charger


	#on vérifie que le joueur a bien fait un choix de niveau
	#pour ne pas charger s'il quitte
	if choix != 0:

		#Chargement du fond
		#fond = pygame.image.load(image_fond).convert()

		#Génération d'un niveau à partir d'un fichier
		niveau = Foret(choix)
		niveau.generer()
		niveau.afficher(fenetre)

