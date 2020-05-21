from models.const import Const
from models.sac import Sac

class Personnage(object):
	"""Décrit les caractéristiques et actions d'un personnage
	joueur ou non-joueur

	init : attributs level et sac

	"""

	DIE = 1

	def __init__(self, name, niveau):
		caract = Const()
		self.name = name
		self.attr = caract.attr_perso
		self.sac = Sac()
		
		
	def deplacer(self):
		pass



class Joueur(Personnage):
	"""Décrit les caractéristiques et actions d'un personnage
	joueur 

	init : 

	"""

	def __init__(self, name, niveau):
		super().__init__(name, niveau)
		self.sprite = caract.img
		self.action = Action(self)

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


		



		
		