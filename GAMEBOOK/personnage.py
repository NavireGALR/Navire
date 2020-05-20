from parser import Parser

class Personnage(object):
	"""Décrit les caractéristiques et actions d'un personnage
	joueur ou non-joueur

	init : 

	"""

	DIE = 1

	def __init__(self):
		self.caract = Parser.caract_from_json('caract.json')
		self.level = 0
		self.sac = Sac()
		



		
		