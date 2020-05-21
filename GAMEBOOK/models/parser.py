import json

class Parser(object):

	@classmethod
	def caract_from_json(cls, file):
		values=[]
		with open(file) as f:
			data = json.load(f)
			for entry in data:
				values.append(entry)
		return values


