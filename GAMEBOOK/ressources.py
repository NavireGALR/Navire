from caract import Caract

class Ressource(object):
	"""docstring for Ressources"""

	def __init__(self, name):
		caract = Caract()
		self.attr = caract.attr_ressources
		self.name = name
		self.value = self.attr[name]
		self.nb = 0

	def stack(self,nb):
		for i in range(1,nb):
			self.nb += 1