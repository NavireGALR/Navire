import screen
import character
import observer
import time

class Event(object):
	"""docstring for Event"""
	
	def __init__(self, screen):
		self.screen = screen
		self.obs = observer.Observer()
		self.TURN = 0

	def attack(self, char, enemy):
		#method called when dps_button is activated
		self.obs.notify(char, enemy, skill=False)

		char.attack(enemy)
		self.obs.print_changes(char, enemy)
		self.screen.update_fight(char, enemy)

	def skill(self, skill, char, enemy):
		#method called when comp_button is activated
		self.obs.notify(char, enemy, skill=True)

		char.skill(skill, enemy)
		self.obs.print_changes(char, enemy)
		self.screen.update_fight(char, enemy)		

	def get_monster_action(self, char, enemy):
		self.TURN += 1
		print("TOUR : {} ".format(self.TURN))
		action = enemy.get_action(self, char)
		print("...")
		#time.sleep(0.8)
		if action == "Skill_1":
			self.skill("Skill_1", enemy, char)
		elif action == "Skill_2":
			self.skill("Skill_2", enemy, char)
		else:
			self.attack(enemy, char)

	
	
	
