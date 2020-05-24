from models.const import Const, Sprite, Position
from models.sac import Sac
from models.action import Action

class Personnage(object):
	"""Décrit les caractéristiques et actions d'un personnage
	joueur ou non-joueur

	init : attributs level et sac

	"""

	DIE = 1

	def __init__(self, name, niveau):
		self.caract = Const()
		self.const = Const()
		self.name = name
		self.attr = self.caract.attr_perso
		self.img = self.caract.img
		self.niveau = niveau
		self.sac = Sac()
		self.action = Action()

		self.case_x = 0
		self.case_y = 0
		self.x = 0
		self.y = 0

	def obstacle_en_face(self, direction):
		self.maj_objet_autour(direction)
		if direction == 'droite' and self.sprite_d in self.const.OBSTACLE:
			return True
		elif direction == 'gauche' and self.sprite_g  in self.const.OBSTACLE:
			return True
		elif direction == 'haut' and self.sprite_h in self.const.OBSTACLE:
			return True
		elif direction == 'bas' and self.sprite_b in self.const.OBSTACLE:
			return True
		else:
			return False

	def dans_jeu(self, direction):
		if direction == 'droite' and self.case_x < (self.const.NB_SPRITE - 1):
			return True
		elif direction == 'gauche' and self.case_x > 0:
			return True
		elif direction == 'haut' and self.case_y > 0:
			return True
		elif direction == 'bas' and self.case_y < (self.const.NB_SPRITE - 1):
			return True
		else:
			return False

	def maj_objet_autour(self, direction):
		if direction == 'droite':
			self.sprite_d = self.niveau.structure[self.case_y][self.case_x +1]
		elif direction == 'gauche':
			self.sprite_g = self.niveau.structure[self.case_y][self.case_x -1]
		elif direction == 'haut':
			self.sprite_h = self.niveau.structure[self.case_y -1][self.case_x]
		elif direction == 'bas':
			self.sprite_b = self.niveau.structure[self.case_y +1][self.case_x]

		
	def deplacer(self, direction):
		self.action.deplacer(self, direction)

	def recolter(self, niveau):
		self.action.recolter(self, niveau)






class Joueur(Personnage):
	"""Décrit les caractéristiques et actions d'un personnage
	joueur 

	init : 

	"""

	def __init__(self, name, niveau):
		super().__init__(name, niveau)
		self.sprite = Sprite(self.img)
		self.direction = self.sprite.droite

	def get_xp(self, xp_gagne):
		self.attr['xp'] += xp_gagne
	
	def up(self):
		self.attr['level'] += 1
		self.attr['xp'] = 0


class Monstres(Personnage):
	"""Décrit les caractéristiques et actions d'un personnage
	non-joueur

	init : 

	"""

	def __init__(self, name):
		super().__init__(name)


		



		
		