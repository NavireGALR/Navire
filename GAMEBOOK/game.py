from models.affichage import Affichage


fenetre = Affichage()


while fenetre.CONTINUER:
	
	fenetre.start()
	while fenetre.ACCUEIL:	
		fenetre.accueil()	
	while fenetre.GAME:
		fenetre.jeu()
