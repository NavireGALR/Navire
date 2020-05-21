from models.affichage import Affichage

continuer = 1

fenetre = Affichage()

while fenetre.CONTINUER:

	fenetre.start()
	while fenetre.ACCUEIL:	
		fenetre.accueil()	
	while fenetre.GAME:
		fenetre.jeu()
