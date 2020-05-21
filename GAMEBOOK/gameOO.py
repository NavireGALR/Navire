from models.affichage import Affichage

continuer = 1
fenetre = Affichage()
while continuer:	
	continuer = fenetre.start()
	continuer = fenetre.acceuil()	
	continuer = fenetre.jeu()
