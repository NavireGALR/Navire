from models.const import Const


class Sac(object):
	"""SAC, réprésente l'objec SAC
	init : ressources, nb_places
	ouvrir : ouvert to TRUE
	fermer : ouvert to FALSE
	choisir objet : retourne l'objet selectionné 
	"""
	OUVERT = False

	def __init__(self):
		caract = Const()
		self.liste_objet = []
		self.attr = caract.attr_sac
		
	def ouvrir(self):
		self.OUVERT = True

	def fermer(self):
		self.OUVERT = False

	def pop_objet(self, objet, nombre=1):
		if objet in self.liste_objet:
			objet.nb -= nombre
			objet_choisi = objet
			objet_choisi.nb = nombre
		else:
			pass #notify observer -> "Cet objet n'existe pas !"
		return objet_choisi

	def ajouter_objet(self, objet):
		if len(self.liste_objet) < self.attr['nb_places']:
			self.liste_objet.append(objet)
		else:
			pass #notify observer -> "Pas assez de place dans ce sac !"

	def supprimer_objet(self, objet):
		if objet in self.liste_objet:
			self.liste_objet.remove(objet)
		else:
			pass #notify observer -> "Cet objet n'existe pas !"

	def print(self):
		for i in range(0,len(self.liste_objet)):
			print(self.liste_objet[i])