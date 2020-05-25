import character

class Observer(object):
	"""docstring for Observer"""

	def __init__(self):
		pass
		
	def notify(self, char, enemy, skill=False):
		self.char_life = char.life
		self.enemy_life = enemy.life
		self.char_lv = char.level
		self.enemy_lv = enemy.level
		self.SKILL = skill
		
	def print_changes(self, char, enemy):
		if self.SKILL:
			print("{} utilise une compétence !".format(char.name))

		if not isinstance(char, character.Monster):
			if char.CRITIC:
				print("COUP CRITIQUE !")

		if char.DMG <= enemy.RES:
			print("{} attaque mais {} résiste, 0 blessures !".format(char.name, enemy.name))

		if enemy.life < self.enemy_life:
			diff = self.enemy_life - enemy.life
			print("{} inflige {} blessure(s) à {}".format(char.name, diff, enemy.name))

		if char.life > self.char_life:
			if char.level is not self.char_lv:
				print("{} est monté au niveau {} !".format(char.name, char.level))
			else:
				diff = char.life - self.char_life
				print("{} se soigne de {} points de vie !".format(char.name, diff))



		

		