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
		objet_choisi = self.ressources[id_objet]

		