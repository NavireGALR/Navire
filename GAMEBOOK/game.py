import pygame
from pygame.locals import *

from constantes import *
from foret import *
from personnage import *

pygame.init()
ingame = int(input())

#Ouverture de la fenêtre Pygame (carré : largeur = hauteur)
fenetre = pygame.display.set_mode((cote_fenetre, cote_fenetre))
#Icone
icone = pygame.image.load(image_icone)
pygame.display.set_icon(icone)
#Titre
pygame.display.set_caption(titre_fenetre)

#BOUCLE PRINCIPALE
continuer = 1
while continuer:	
	#Chargement et affichage de l'écran d'accueil
	accueil = pygame.image.load(image_accueil).convert()
	fenetre.blit(accueil, (0,0))

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
				#Variable de choix du niveau
				choix = 0
				
			elif event.type == KEYDOWN:				
				#Lancement du jeu
				if event.key == K_BACKSPACE:
					continuer_accueil = 0	#On quitte l'accueil
					choix = 'jeu'		#On définit le niveau à charger
			
		

	#on vérifie que le joueur a bien fait un choix de niveau
	#pour ne pas charger s'il quitte
	if choix != 0:
		#Chargement du fond
		fond = pygame.image.load(image_fond).convert()

		#Génération d'un niveau à partir d'un fichier
		niveau = Foret(choix)
		niveau.generer()
		niveau.afficher(fenetre)

		#Création de Donkey Kong
		moi = Personnage("images/moi_droite.png", "images/moi_gauche.png", 
		"images/moi_haut.png", "images/moi_bas.png", niveau)

				
	#BOUCLE DE JEU
	while continuer_jeu:
	
		#Limitation de vitesse de la boucle
		pygame.time.Clock().tick(30)
	
		for event in pygame.event.get():
		
			#Si l'utilisateur quitte, on met la variable qui continue le jeu
			#ET la variable générale à 0 pour fermer la fenêtre
			if event.type == QUIT:
				continuer_jeu = 0
				continuer = 0
		
			elif event.type == KEYDOWN:
				#Si l'utilisateur presse Echap ici, on revient seulement au menu
				if event.key == K_ESCAPE:
					continuer_jeu = 0
					
				#Touches de déplacement de Donkey Kong
				elif event.key == K_RIGHT:
					moi.deplacer('droite')
				elif event.key == K_LEFT:
					moi.deplacer('gauche')
				elif event.key == K_UP:
					moi.deplacer('haut')
				elif event.key == K_DOWN:
					moi.deplacer('bas')			
			
		#Affichages aux nouvelles positions
		fenetre.blit(fond, (0,0))
		niveau.afficher(fenetre)
		fenetre.blit(moi.direction, (moi.x, moi.y)) #dk.direction = l'image dans la bonne direction
		pygame.display.flip()

		#Victoire -> Retour à l'accueil
		if niveau.structure[moi.case_y][moi.case_x] == 'a':
			continuer_jeu = 0

