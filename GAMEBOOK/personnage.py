from parser import Parser
from caract import Caract

class Personnage(object):
	"""Décrit les caractéristiques et actions d'un personnage
	joueur ou non-joueur

	init : attributs level et sac

	"""

	DIE = 1

<<<<<<< HEAD
	def __init__(self ,droite, gauche, haut, bas, niveau):
		"""self.caract = Parser.caract_from_json('caract.json')
		self.level = 0
		self.sac = Sac()"""

		#Sprites du personnage
		self.droite = pygame.image.load(droite).convert_alpha()
		self.gauche = pygame.image.load(gauche).convert_alpha()
		self.haut = pygame.image.load(haut).convert_alpha()
		self.bas = pygame.image.load(bas).convert_alpha()
		#Position du personnage en cases et en pixels
		self.case_x = 0
		self.case_y = 0
		self.x = 0
		self.y = 0
		#Direction par défaut
		self.direction = self.droite
		#Niveau dans lequel le personnage se trouve 
		self.niveau = niveau


		def deplacer(self, direction):
		"""Methode permettant de déplacer le personnage"""
		
		#Déplacement vers la droite
		if direction == 'droite':
			#Pour ne pas dépasser l'écran
			if self.case_x < (nombre_sprite_cote - 1):
				#On vérifie que la case de destination n'est pas du bois
				if self.niveau.structure[self.case_y][self.case_x+1] != 'b':
					#Déplacement d'une case
					self.case_x += 1
					#Calcul de la position "réelle" en pixel
					self.x = self.case_x * taille_sprite
			#Image dans la bonne direction
			self.direction = self.droite
=======
	def __init__(self):
		caract = Caract()
		self.attr = caract.attr
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

>>>>>>> 7c1ecd34e9d89892267cd87582ccd5d99533adf9
		
		#Déplacement vers la gauche
		if direction == 'gauche':
			if self.case_x > 0:
				if self.niveau.structure[self.case_y][self.case_x-1] != 'b':
					self.case_x -= 1
					self.x = self.case_x * taille_sprite
			self.direction = self.gauche
		
		#Déplacement vers le haut
		if direction == 'haut':
			if self.case_y > 0:
				if self.niveau.structure[self.case_y-1][self.case_x] != 'b':
					self.case_y -= 1
					self.y = self.case_y * taille_sprite
			self.direction = self.haut
		
		#Déplacement vers le bas
		if direction == 'bas':
			if self.case_y < (nombre_sprite_cote - 1):
				if self.niveau.structure[self.case_y+1][self.case_x] != 'b':
					self.case_y += 1
					self.y = self.case_y * taille_sprite
			self.direction = self.bas





		
		