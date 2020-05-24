from models.const import Const

class Action(object):
	"""docstring for Action"""
	def __init__(self):
		self.const = Const()
		
	def deplacer(self, joueur, direction):
		if joueur.dans_jeu(direction):
			if direction == 'droite':
				joueur.direction = joueur.sprite.droite
				if not joueur.obstacle_en_face(direction):
					joueur.case_x += 1
					joueur.x = joueur.case_x * self.const.TAILLE_SPRITE
			elif direction == 'gauche':
				joueur.direction = joueur.sprite.gauche
				if not joueur.obstacle_en_face(direction):
					joueur.case_x -= 1
					joueur.x = joueur.case_x * self.const.TAILLE_SPRITE
			elif direction == 'haut':
				joueur.direction = joueur.sprite.haut
				if not joueur.obstacle_en_face(direction):
					joueur.case_y -= 1
					joueur.y = joueur.case_y * self.const.TAILLE_SPRITE
			elif direction == 'bas':
				joueur.direction = joueur.sprite.bas
				if not joueur.obstacle_en_face(direction):
					joueur.case_y += 1
					joueur.y = joueur.case_y * self.const.TAILLE_SPRITE

	def recolter(self, joueur, niveau):
		niveau.get_obstacle(joueur)
		joueur.sac.ajouter_objet(niveau.objet_choisi)
		niveau.modif_terrain()
		joueur.sac.print()
		#notif observer logs
		
		
	def attaquer(self, p1, p2):
		pass

	def manger(self, p1, ressources):
		p1.attr['faim'] += (ressources.value + p1.attr['regen_faim'])

	def boire(self, p1, ressources):
		p1.attr['hydratation'] += (ressources.value + p1.attr['regen_hydratation'])

	def utiliser(self, p1, target):
		pass

	def fabriquer(self, p1, target):
		pass

		