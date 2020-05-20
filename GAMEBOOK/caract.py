from parser import Parser

class Caract(object):
	"""docstring for Caract"""
	def __init__(self, type):
		attr = Parser.caract_from_json('attr.json')
	
		self.ressources = Parser.caract_from_json('ressources.json')
		self.attr_perso = attr[0]
		self.attr_ressources = attr[1]
		

		