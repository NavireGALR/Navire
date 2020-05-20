from parser import Parser

class Caract(object):
	"""docstring for Caract"""
	def __init__(self, type):
		self.ressources = Parser.caract_from_json('ressources.json')
		self.attr = Parser.caract_from_json('attr.json')

		