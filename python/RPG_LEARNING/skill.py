class Skill(object):
	"""docstring for Skill"""

	CD_1 = 1
	CD_2 = 2
	CD_3 = 3
	CD_4 = 4
	CD_5 = 5

	def __init__(self):
		pass

	""" WARRIOR SKILL """
	
	@classmethod
	def AXE(cls, char, enemy):
		char.caract["STR"] += 50
		char.update_stats()
		char.attack(enemy)
		char.caract["STR"] -= 50
		char.update_stats()
		char.SKILL_CD = cls.CD_2

	@classmethod
	def SHIELD(cls, char, enemy):
		char.caract["DEX_mod"] += 5
		char.update_stats()
		char.BLOCK = True
		char.SKILL2_CD = cls.CD_5

	""" SORCELER SKILL """

	@classmethod
	def FIREBALL(cls, char, enemy):
		char.caract["INT"] += 100
		char.update_stats()
		char.attack(enemy)
		char.caract["INT"] -= 100
		char.update_stats()
		char.SKILL_CD = cls.CD_3

	@classmethod
	def HEAL(cls, char):
		char.caract["INT_mod"] += 1
		char.life += char.regen
		char.SKILL2_CD = cls.CD_4

	""" THIEF SKILL """

	@classmethod
	def AMBIDEXTRY(cls, char, enemy):
		char.caract["DEX"] = int(char.caract["DEX"] * 2)
		char.update_stats()
		char.attack(enemy)
		char.caract["DEX"] = int(char.caract["DEX"] / 2)
		char.update_stats()
		char.SKILL_CD = cls.CD_5

	@classmethod
	def STEALTH(cls, char, enemy):
		char.caract["DEX"] += 20
		char.STEALTH = True
		char.SKILL2_CD = cls.CD_2

	""" MONSTER SKILL """

	@classmethod
	def CURSE(cls, char, enemy):
		enemy.caract["DEX"] -= 50
		char.attack(enemy)

	@classmethod
	def FALL(cls, char, enemy):
		char.caract["DEX"] -= 20
		char.caract["STR"] += 20
		char.attack(enemy)