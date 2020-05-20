from parser import Parser


class Sac(object):
	OUVERT = False
	"""docstring for ClassName"""
	def __init__(self):
		self.place = 0
		self.ressouces = Parser.caract_from_json('ressources.json')

	def ouvrir(self):
		self.OUVERT = True

	def fermer(self):
		self.OUVERT = False

	def choisir_objet(self, id_objet, nb_objet):
		if nb_objet <= self.ressources[id_object]:
			objet_choisi = {id_object,nb_objet}
		return objet_choisi

	