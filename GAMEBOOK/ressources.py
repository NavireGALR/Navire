from caract import Caract

class Ressources(object):
	"""docstring for Ressources"""

	caract = Caract()
	ALL = caract.ressources
	
	def __init__(self, name):
		caract = Caract()
		self.attr = caract.attr_ressources
		self.name = name
		self.value = self.attr[name]