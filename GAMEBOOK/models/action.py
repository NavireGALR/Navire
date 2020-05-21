class Action(object):
	"""docstring for Action"""
	def __init__(self, joueur):
		self.joueur = joueur

	def attaquer(self, p1, p2):
		pass

	def recolter(self, target):
		if self.joueur.direction == self.joueur.droite:
			if self.joueur.niveau.structure[self.joueur.case_y][self.joueur.case_x +1] == 'b':
				if target.recoltable:
					self.joueur.sac.ajouter_objet(target)
					print(self.joueur.sac.liste_objet)
		if self.joueur.direction == self.joueur.gauche:
			if self.joueur.niveau.structure[self.joueur.case_y][self.joueur.case_x -1] == 'b':
				if target.recoltable:
					self.joueur.sac.ajouter_objet(target)
					print(self.joueur.sac.liste_objet)
		if self.joueur.direction == self.joueur.haut:
			if self.joueur.niveau.structure[self.joueur.case_y -1][self.joueur.case_x] == 'b':
				if target.recoltable:
					self.joueur.sac.ajouter_objet(target)
					print(self.joueur.sac.liste_objet)	
		if self.joueur.direction == self.joueur.bas:
			if self.joueur.niveau.structure[self.joueur.case_y +1][self.joueur.case_x] == 'b':
				if target.recoltable:
					self.joueur.sac.ajouter_objet(target)
					print(self.joueur.sac.liste_objet)	
		


	def manger(self, p1, ressources):
		p1.attr['faim'] += (ressources.value + p1.attr['regen_faim'])

	def boire(self, p1, ressources):
		p1.attr['hydratation'] += (ressources.value + p1.attr['regen_hydratation'])

	def utiliser(self, p1, target):
		pass

	def fabriquer(self, p1, target):
		pass

		