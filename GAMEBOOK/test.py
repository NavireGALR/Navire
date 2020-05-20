from personnage import Joueur
from ressources import Ressource

ekawa = Joueur("Ekawa")
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


if carotte in seb.sac.liste_objet and carotte not in ekawa.sac.liste_objet:
	print('gg')
else:
	print('un truc cloche')


