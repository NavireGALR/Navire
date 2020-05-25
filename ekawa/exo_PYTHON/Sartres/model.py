import json
import math 

class Position(object):
	"""Init from JSON Position"""
	def __init__(self, longitude_d, latitude_d):
		self.latitude_d = latitude_d
		self.longitude_d = longitude_d
		
	@property
	def longitude(self):
		return self.longitude_d * math.pi / 180
	@property
	def latitude(self):
		return self.latitude_d * math.pi / 180
	

class Agent(object):
	"""Init with caract from json file"""
	def __init__(self, position, caract):
		self.position = position
		for attr_name, attr_value in caract.items():
			setattr(self, attr_name, attr_value)

class Zone(object):

	MIN_LONG = -180
	MIN_LAT = -90
	MAX_LONG = 180
	MAX_LAT = 90
	WIDTH = 1
	GRID = []

	def __init__(self, corner1, corner2):
	    self.corner1 = corner1
	    self.corner2 = corner2
	    self.inhabitants = []

    
	def add_inhabitant(self, inhabitant):
		self.inhabitants.append(inhabitant)

	@property
	def population(self):
		return len(self.inhabitants)
	
	@classmethod
	def checkAgent_is_in_zone(cls, agent):
		if not cls.GRID:
			cls._createZones()

		for i in cls.GRID:	
			if i.corner1.latitude <= agent.position.latitude <= i.corner2.latitude:
				a = True
			else:
				a = False
			if i.corner1.longitude <= agent.position.longitude <= i.corner2.longitude:
				b = True
			else:
				b = False

			if a == True and b == True:
				return i

	@classmethod
	def _createZones(cls):
		for y in range(cls.MIN_LAT, cls.MAX_LAT, cls.WIDTH):
			for x in range(cls.MIN_LONG, cls.MAX_LONG, cls.WIDTH):
				bottom_left_corner = Position(x, y)
				top_right_corner = Position(x + cls.WIDTH, y + cls.WIDTH)
				zone = Zone(bottom_left_corner, top_right_corner)
				cls.GRID.append(zone)
    	

# Read JSON FILE
def reader(file):
	with open(file) as f:
		data = json.load(f)
	return data

def mainLoop():
	for caract in reader("agents-100k.json"):
		latitude = caract.pop("latitude")
		longitude = caract.pop("longitude")
		position = Position(longitude, latitude)
		agent = Agent(position, caract)
		zone = Zone.checkAgent_is_in_zone(agent)
		zone.add_inhabitant(agent)
	print(zone.population)
	

	
	

if __name__ == '__main__':
    mainLoop()