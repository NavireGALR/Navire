from models.personnage import Joueur
from models.terrain import *
from models.affichage import Affichage

fenetre = Affichage()
mapjoueur = Foret('name', fenetre)
mapjoueur.modif_terrain()

"""
seb = Joueur('Seb')
carotte = Ressource('carotte')
viande = Ressource('viande')
ekawa.sac.ouvrir()
print(ekawa.sac.OUVERT)
ekawa.sac.ajouter_objet(carotte)
ekawa.sac.ajouter_objet(viande)
carotte.stack(10)

if carotte in ekawa.sac.liste_objet:
	print('le sac contient des carottes !')
else:
	print('le sac ne contient PAS de carottes !')

objet = ekawa.sac.pop_objet(carotte)
seb.sac.ajouter_objet(objet)

a = ekawa.sac.liste_objet
print()

"""
