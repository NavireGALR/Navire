from parser import Parser
from caract import Caract

class Personnage(object):
	"""Décrit les caractéristiques et actions d'un personnage
	joueur ou non-joueur

	init : attributs level et sac

	"""

	DIE = 1

	def __init__(self):
		caract = Caract()
		self.attr = caract.attr[0]
		self.sac = Sac()



class Joueur(Personnage):
	"""Décrit les caractéristiques et actions d'un personnage
	joueur 

	init : 

	"""

	def __init__(self):
		super().__init__()

	def get_xp(self, xp_gagne)
		self.attr['xp'] += xp_gagne
	
	def up(self)
		self.attr['level'] += 1
		self.attr['xp'] = 0


class Monstres(Personnage):
	"""Décrit les caractéristiques et actions d'un personnage
	non-joueur

	init : 

	"""

	def __init__(self):
		super().__init__()


		



		
		