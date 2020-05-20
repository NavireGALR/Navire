from caract import Caract


class Sac(object):
	"""SAC, réprésente l'objec SAC
	init : ressources, nb_places
	ouvrir : ouvert to TRUE
	fermer : ouvert to FALSE
	choisir objet : retourne l'objet selectionné 
	"""
	OUVERT = False

	def __init__(self):
		caract = Caract()
		self.nb_places = 0
		self.ressources = caract.ressources

	def ouvrir(self):
		self.OUVERT = True

	def fermer(self):
		self.OUVERT = False

	def choisir_objet(self, objet, nb_objet):
		if nb_objet <= self.ressources[id_object]:
			objet_choisi = {objet,nb_objet}
		else:
			objet_choisi = {objet,self.ressources[id_object]}
		return objet_choisi

	