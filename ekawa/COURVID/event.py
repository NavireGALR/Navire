import turtle
import random
import subject 

from grid import *


class Event(object):

	def __init__(self):
		self.trophy = subject.Trophy()

	def is_in_grid(self, sub):
		if Grid.GRID.corner1.x <= sub.corner1.x <= Grid.GRID.corner2.x and Grid.GRID.corner1.y <= sub.corner1.y <= Grid.GRID.corner2.y:
			return True 
		else:
			return False

	def too_close(self, sub):
		for i in range (len(Grid.LIST_ZONE)):
			for y in range (len(subject.Bot.LIST_BOT)):
				if Grid.LIST_ZONE[i].has_bot(subject.Bot.LIST_BOT[y]) and Grid.LIST_ZONE[i].has_player(sub):
					return True

	def getEvent(self, player):
		self.get_infected(player)
		self.is_win(player)
		self.notify(player)

	def get_infected(self, player):
		for i in range(len(Grid.LIST_ZONE)):	
			if Grid.LIST_ZONE[i].has_player(player) and Grid.LIST_ZONE[i].is_contamined():
				player.color = "orange"
				player.infected += 1
				print("Infection (max 3) : {}".format(player.infected))	
				if player.infected > 2:
					player.color = "black"

	def is_win(self, player):
		for i in range(len(Grid.LIST_ZONE)):
			if Grid.LIST_ZONE[i].has_player(player) and Grid.LIST_ZONE[i].has_trophy(self.trophy):
				if player.infected <= 2:
					print("[GAGNE] Vous avez trouvez le vaccin !")
				else:
					print("[PERDU] Vous êtes trop infecté, le vaccin ne peut vous sauvez !")
			else:
				for y in range(len(subject.Bot.LIST_BOT)):
					if Grid.LIST_ZONE[i].has_bot(subject.Bot.LIST_BOT[y]) and Grid.LIST_ZONE[i].has_trophy(self.trophy):
						print("[PERDU] Un infecté a atteint le vaccin avant vous !")

	def notify(self, player):
		if isinstance(player, subject.Player):
			for y in range(len(subject.Bot.LIST_BOT)):
				subject.Bot.LIST_BOT[y].moveBot()