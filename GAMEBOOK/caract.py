from parser import Parser

class Caract(object):
	"""docstring for Caract"""
	def __init__(self):

		attr_perso = Parser.caract_from_json('json/attr_perso.json')
		attr_ressources = Parser.caract_from_json('json/attr_ressources.json')
		attr_sac = Parser.caract_from_json('json/attr_sac.json')

		self.attr_perso = attr_perso[0]
		self.attr_ressources = attr_ressources[0]
		self.attr_sac = attr_sac[0]
		

		