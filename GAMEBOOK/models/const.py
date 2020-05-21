from parser import Parser

class Const(object):
	"""docstring for Caract"""
	def __init__(self):

		self.attr_perso = Parser.caract_from_json('json/attr_perso.json')
		self.attr_ressources = Parser.caract_from_json('json/attr_ressources.json')
		self.attr_sac = Parser.caract_from_json('json/attr_sac.json')
		self.img = Parser.caract_from_json('json/img.json')

		self.attr_perso = attr_perso[0]
		self.attr_ressources = attr_ressources[0]
		self.attr_sac = attr_sac[0]
		

		