import random
import json
from skill import Skill
from event import Event

class Character(object):
	"""Parent Class for playable characters


	"""

	DEAD = False
	GET_HURT = 2
	SKILL_CD = 0
	SKILL2_CD = 0
	COEF_DMG = 5
	CRITIC = False

	

	def __init__(self, caract):
		self.caract = caract
		self.level = 1
		self.xp = 0
		self.LIFE_MAX = self.caract["CON"]
		self.life = self.LIFE_MAX
		self.RES = self.caract["CON_mod"] + self.caract["DEX_mod"]
		self.regen = self.caract["INT_mod"] * 10
	
	def up(self):
		self.level += int(self.xp/100)
		self.xp = 0
		self.caract["CON"] += self.caract["CON_mod"]
		self.caract["DEX"] += self.caract["DEX_mod"]
		self.caract["INT"] += self.caract["INT_mod"]
		self.caract["STR"] += self.caract["STR_mod"]
		self.update_stats()

	def attack(self, enemy):
		self.set_cd()
		self.update_stats()
		return enemy.get_hurt(self)

	def critic(self):
		critic = random.randint(1,10)
		if critic == 10:
			return True
			self.COEF_DMG = 4
		else:
			return False
			self.COEF_DMG = 5

	def skill(self):
		self.set_cd()
		self.update_stats()

	def set_cd(self):
		if self.SKILL_CD != 0:
			self.SKILL_CD -= 1
		if self.SKILL2_CD != 0:
			self.SKILL2_CD -= 1

	def update_stats(self):
		self.LIFE_MAX = self.caract["CON"]
		self.RES = self.caract["CON_mod"] + self.caract["DEX_mod"]

	def get_hurt(self, enemy):
		self.life -= int(enemy.DMG - self.RES)
		if self.life <= 0:
			self.DEAD = True
			enemy.gain_xp(self.DEAD)
		else:
			enemy.gain_xp(self.GET_HURT)

	def gain_xp(self, is_dead):
		if is_dead == True:
			self.xp += 75
		else:
			self.xp += 25

		if self.xp >= 100:
			self.up()






class Warrior(Character):
	""" WARRIOR CLASS 




	""" 

	BLOCK = False

	def __init__(self, name, caract):
		super().__init__(caract)
		self.name = name
		self.DMG = int(self.caract["STR"] / self.COEF_DMG)
		

	def up(self):
		if self.level%3 == 0:
			self.caract["STR_mod"] += 4
			self.caract["CON_mod"] += 3
			self.caract["DEX_mod"] += 2
			self.caract["INT_mod"] += 1
		super().up()
			

	def attack(self, enemy):
		self.BLOCK = False
		super().attack(enemy)
		

	def get_hurt(self, enemy):
		if self.BLOCK:
			self.RES = enemy.DMG
		super().get_hurt(enemy)
		

	def skill(self, skill, enemy):
		super().skill()
		if skill == "Skill_1": 
			Skill.AXE(self, enemy)
		elif skill == "Skill_2":
			Skill.SHIELD(self, enemy)
		else:
			pass


	def update_stats(self):
		super().update_stats()
		self.DMG = int(self.caract["STR"] / self.COEF_DMG)

		




class Sorceler(Character):
	""" SORCELER CLASS 




	""" 

	def __init__(self, name, caract):
		super().__init__(caract)
		self.name = name
		self.DMG = int(self.caract["INT"] / self.COEF_DMG)
		

	def up(self):
		super().up()
		if self.level%3 == 0:
			self.caract["INT_mod"] += 4
			self.caract["CON_mod"] += 3
			self.caract["DEX_mod"] += 2
			self.caract["STR_mod"] += 1

	def skill(self, skill, enemy):
		super().skill()
		if skill == "Skill_1": #FIREBALL
			Skill.FIREBALL(self, enemy)
		elif skill == "Skill_2":
			Skill.HEAL(self)
		else:
			pass

	def update_stats(self):
		super().update_stats()
		self.DMG = int(self.caract["INT"] / self.COEF_DMG)





class Thief(Character):
	"""THIEF CLASS 




	""" 

	STEALTH = False

	def __init__(self, name, caract):
		super().__init__(caract)
		self.name = name
		self.DMG = int(self.caract["DEX"] / self.COEF_DMG)

	def up(self):
		super().up()
		if self.level%3 == 0:
			self.caract["DEX_mod"] += 4
			self.caract["STR_mod"] += 3
			self.caract["CON_mod"] += 2
			self.caract["INT_mod"] += 1
			
			
	def skill(self, skill, enemy):
		super().skill()
		if skill == "Skill_1": #Ambidextry
			Skill.AMBIDEXTRY(self, enemy)
		elif skill == "Skill_2":
			Skill.STEALTH(self, enemy)
		else:
			pass

	def attack(self, enemy):
		self.STEALTH = False
		super().attack(enemy)
		

	def get_hurt(self, enemy):
		if self.STEALTH:
			self.RES = enemy.DMG
		super().get_hurt(enemy)
		

	def update_stats(self):
		super().update_stats()
		self.DMG = int(self.caract["DEX"] / self.COEF_DMG )







class Monster(Character):
	""" MONSTER CLASS 




	""" 
	WARRIOR = False
	SORCELER = False
	THIEF = False

	def __init__(self, caract, player):
		super().__init__(caract)
		self.name = self.caract["name"]
		self.xp = player.level*100
		for i in range(1,player.level):
			self.up()

		self.update_stats()
		self.life = self.LIFE_MAX
		self.LOW_LIFE = int(self.LIFE_MAX / 5)
		self.regen /= 2

		

		
	def up(self):
		super().up()
		if self.level%3 == 0:
			self.caract["DEX_mod"] += 2
			self.caract["STR_mod"] += 2
			self.caract["CON_mod"] += 2
			self.caract["INT_mod"] += 2

	def update_stats(self):
		super().update_stats()
		if self.caract["legend"] == "Warrior":	
			self.DMG = self.caract["STR"] / self.COEF_DMG
			self.WARRIOR = True
		elif self.caract["legend"] == "Sorceler":
			self.DMG = self.caract["INT"] / self.COEF_DMG
			self.SORCELER = True
		else:
			self.DMG = self.caract["DEX"] / self.COEF_DMG
			self.THIEF = True


	def skill(self, skill, enemy):
		super().skill()
		if self.WARRIOR:
			if skill == "Skill_1": #Ambidextry
				Skill.AXE(self, enemy)
			elif skill == "Skill_2":
				Skill.FALL(self, enemy)
			else:
				pass
		if self.SORCELER:
			if skill == "Skill_1": #Ambidextry
				Skill.CURSE(self, enemy)
			elif skill == "Skill_2":
				Skill.HEAL(self)
			else:
				pass

	def get_action(self, event, enemy):
		if event.TURN % 3 == 0.00 :
			return "Skill_1"
		elif self.life <= self.LOW_LIFE:
			return "Skill_2"
		else:
			return "ATTACK"







class Parse():

	NB_MONSTER = 0

	@classmethod
	def caract_from_json(cls, file):
		values=[]
		with open(file) as f:
			data = json.load(f)
			for entry in data:
				values.append(entry)
		return values

	@classmethod
	def get_legend(cls, legend):
		legend_caract = cls.caract_from_json('json/character.json')
		if legend == "Warrior":
			return legend_caract[0]
		elif legend == "Sorceler":
			return legend_caract[1]
		else: 
			return legend_caract[2]

	@classmethod
	def get_monster(cls, player):
		cls.NB_MONSTER += 1
		monster_caract = cls.caract_from_json('json/monster.json')
		boss_caract = cls.caract_from_json('json/boss.json')

		if cls.NB_MONSTER == 5:
			return Monster(random.choice(boss_caract), player)
		else:
			return Monster(random.choice(monster_caract), player)
		
			

	
