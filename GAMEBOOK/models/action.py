class Action(object):
	"""docstring for Action"""
	def __init__(self, joueur):
		self.joueur = joueur
		

	def attaquer(self, p1, p2):
		pass

	def recolter(self, target):
		self.sprite_d = self.joueur.niveau.structure[self.joueur.case_y][self.joueur.case_x +1]
		self.sprite_g = self.joueur.niveau.structure[self.joueur.case_y][self.joueur.case_x -1]
		self.sprite_h = self.joueur.niveau.structure[self.joueur.case_y -1][self.joueur.case_x]
		self.sprite_b = self.joueur.niveau.structure[self.joueur.case_y +1][self.joueur.case_x]
		
		if self.joueur.direction == self.joueur.droite:
			if self.sprite_d in target.SPRITE:
				if target.recoltable:
					self.joueur.sac.ajouter_objet(target.get_ressource(self.sprite_d))
					print(self.joueur.sac.liste_objet)
		if self.joueur.direction == self.joueur.gauche:
			if self.sprite_g in target.SPRITE:
				if target.recoltable:
					self.joueur.sac.ajouter_objet(target.get_ressource(self.sprite_g))
					print(self.joueur.sac.liste_objet)
		if self.joueur.direction == self.joueur.haut:
			if self.sprite_h in target.SPRITE:
				if target.recoltable:
					self.joueur.sac.ajouter_objet(target.get_ressource(self.sprite_h))
					print(self.joueur.sac.liste_objet)	
		if self.joueur.direction == self.joueur.bas:
			if self.sprite_b in target.SPRITE:
				if target.recoltable:
					self.joueur.sac.ajouter_objet(target.get_ressource(self.sprite_b))
					print(self.joueur.sac.liste_objet)	
		


	def manger(self, p1, ressources):
		p1.attr['faim'] += (ressources.value + p1.attr['regen_faim'])

	def boire(self, p1, ressources):
		p1.attr['hydratation'] += (ressources.value + p1.attr['regen_hydratation'])

	def utiliser(self, p1, target):
		pass

	def fabriquer(self, p1, target):
		pass

		