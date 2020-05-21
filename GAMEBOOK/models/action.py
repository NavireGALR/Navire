class Action(object):
	"""docstring for Action"""
	def __init__(self, joueur):
		self.joueur = joueur

	def attaquer(self, p1, p2):
		pass

	def recolter(self, target):
		self.joueur.x

	def manger(self, p1, ressources):
		p1.attr['faim'] += (ressources.value + p1.attr['regen_faim'])

	def boire(self, p1, ressources):
		p1.attr['hydratation'] += (ressources.value + p1.attr['regen_hydratation'])

	def utiliser(self, p1, target):
		pass

	def fabriquer(self, p1, target):
		pass

		