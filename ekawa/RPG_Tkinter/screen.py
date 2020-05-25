from tkinter import * 
import tkinter.ttk as ttk
from PIL import ImageTk, Image
from functools import partial
import character
import event


class Select(Frame):
	"""docstring for Select"""
	def __init__(self, screen, **kwargs):
		# Init Frame
		Frame.__init__(self, screen, width=768, height=576, padx=20, pady=20, **kwargs)
		
		self.selected_class = StringVar()
		self.entry = StringVar()
		self.toFight = partial(self.fight, screen)

		listFrame = LabelFrame(self, borderwidth=1, padx=10, pady=10, text="Choisis une classe :")
		war = Radiobutton(listFrame, text="Guerrier", variable=self.selected_class, value="warrior", indicatoron=False)
		sorc = Radiobutton(listFrame, text="Magicien", variable=self.selected_class, value="sorceler", indicatoron=False)
		thief = Radiobutton(listFrame, text="Voleur", variable=self.selected_class, value="thief", indicatoron=False)
		nameFrame = LabelFrame(self, borderwidth=1, padx=10, pady=10, text="Choisis un nom :")
		name_entry = Entry(nameFrame, textvariable=self.entry, width=30)
		fight = Button(self, text="Partir au combat !", command=self.toFight)

		self.pack(fill=BOTH)
		listFrame.pack(fill=BOTH)
		war.pack(fill=BOTH)
		sorc.pack(fill=BOTH)
		thief.pack(fill=BOTH)
		nameFrame.pack()
		name_entry.pack()
		fight.pack()

		
	def fight(self, screen):
		#get infos
		name = self.entry.get()
		choosen_class = self.selected_class.get()
		parse = character.Parse()

		#select appropriate class
		if choosen_class == "warrior":
			char = character.Warrior(name, parse.get_legend("Warrior"))
		if choosen_class == "sorceler":
			char = character.Sorceler(name, parse.get_legend("Sorceler"))
		if choosen_class == "thief":
			char = character.Thief(name, parse.get_legend("Thief"))
		enemy = parse.get_monster(char)

		#destroy and call fight screen
		self.destroy()
		interface = Screen(screen, char, enemy)
		interface.mainloop()









class Screen(Frame):
	"""Main Screen of the game

	screen_fight
	screen_info
	screen_action
	dead_screen


	"""
	def __init__(self, screen, player, monster,  **kwargs):
		# Init Frame
		Frame.__init__(self, screen, width=768, height=576, padx=10, pady=10, **kwargs)
		self.background_image = ImageTk.PhotoImage(Image.open("img/bg.jpg"))
		self.pack(fill=BOTH)
		self.screen = screen
		self.event = event.Event(self)


		#Init player in frame
		self.player = player
		self.monster = monster
		self.new_screen()


	def screen_fight(self, char, enemy):
		style = ttk.Style()
		style.theme_use('alt')
		
		fight_frame = LabelFrame(self, width=768, height=369, borderwidth=0, pady=20, padx=20, text="Level 1, monstre n° {}".format(character.Parse.NB_MONSTER))
		empty_frame = Frame(fight_frame, borderwidth=0, width=300)
		player_cnv = Canvas(fight_frame)
		monster_cnv = Canvas(fight_frame)

		player_img = PhotoImage(file=char.caract["img_url"])
		player_cnv.configure(width=player_img.width(), height=player_img.height())
		player_cnv.create_image(player_img.width()/2,player_img.height()/2,image=player_img)
		player_cnv.image = player_img 

		monster_img = PhotoImage(file=enemy.caract["img_url"])
		monster_cnv.configure(width=monster_img.width(), height=monster_img.height())
		monster_cnv.create_image(monster_img.width()/2,monster_img.height()/2,image=monster_img)
		monster_cnv.image = monster_img 

		#lifebar
		style.configure("bar.Horizontal.TProgressbar",troughcolor ='gray', background='red')
		char_life = ttk.Progressbar(fight_frame, style="bar.Horizontal.TProgressbar", orient=HORIZONTAL, maximum=char.LIFE_MAX, mode='determinate') 
		char_life['value'] = char.life
		char_label_life = Label(fight_frame, text=char.life, fg='white', bg='red')
		monster_life = ttk.Progressbar(fight_frame, style="bar.Horizontal.TProgressbar", orient=HORIZONTAL, maximum=enemy.LIFE_MAX, mode='determinate') 
		monster_life['value'] = enemy.life
		monster_label_life = Label(fight_frame, text=enemy.life, fg='white', bg='red')


		fight_frame.grid(row=0, column=0, columnspan=3)
		player_cnv.grid(row=0, column=0, sticky=N)
		empty_frame.grid(row=0, column=1)
		monster_cnv.grid(row=0, column=2, sticky=N)

		char_life.grid(row=1, column=0)
		monster_life.grid(row=1, column=2)
		char_label_life.grid(row=1, column=0)
		monster_label_life.grid(row=1, column=2)

		return fight_frame


	def screen_info(self, char, enemy):
		#method to create frame info character
		char_info = LabelFrame(self, width=384, borderwidth=0, height=288, padx=42, pady=10, text=char.name)
		life = Label(char_info, text="Point de vie : {}".format(char.life))
		power = Label(char_info, text="Puissance : {}".format(char.DMG))
		res = Label(char_info, text="Résistance : {}".format(char.RES))
		level = Label(char_info, text="Level : {}".format(char.level))
		xp = Label(char_info, text="XP : {} / 100".format(char.xp))
		
		if char is self.player:
			char_info.grid(row=1, column=0)
		else:
			char_info.grid(row=1, column=2)
		life.pack()
		power.pack()
		res.pack()
		level.pack()
		xp.pack()
		
		return char_info


	def screen_action(self, char, enemy):
		button_frame = Frame(self, padx=10, pady=10)

		toAttack = partial(self.event.attack, char, enemy)
		toSkill_1 = partial(self.event.skill, "Skill_1", char, enemy)
		toSkill_2 = partial(self.event.skill, "Skill_2", char, enemy)
		dps_button = Button(button_frame, text="Attaquer", command=toAttack)
		skill_button = Button(button_frame, text=char.caract["Skill_1"], command=toSkill_1)
		skill2_button = Button(button_frame, text=char.caract["Skill_2"], command=toSkill_2)

		button_frame.grid(row=1, column=1)
		dps_button.pack()
		skill_button.pack()
		skill2_button.pack()

		if char.DEAD or enemy.DEAD:
			dps_button.config(state=DISABLED)
			skill_button.config(state=DISABLED)
			skill2_button.config(state=DISABLED)

		if char.SKILL_CD != 0:
			skill_button.config(state=DISABLED)

		if char.SKILL2_CD != 0:
			skill2_button.config(state=DISABLED)

		return button_frame

	
	def dead_screen(self, char):
		#Method called when one player is dead
		dead_info = LabelFrame(self, width=384, height=288, borderwidth=1, padx=42, pady=42, text=char.name)
		next_button = Button(dead_info, text="Affronter le prochain monstre", command=self.next_monster)
		again_button = Button(dead_info, text="Try again", command=self.restart)
		dead_msg = Label(dead_info, text="{} est mort !".format(char.name))

		dead_msg.pack()
		if not isinstance(char, character.Monster):
			dead_info.grid(row=0, column=0)
			again_button.pack()
		else:
			dead_info.grid(row=0, column=2)
			next_button.pack()


	def forget_all(self):
		self.fight_frame.forget()
		self.player_info.forget()
		self.button.forget()
		self.monster_info.forget()


	def new_screen(self):
		self.fight_frame = self.screen_fight(self.player, self.monster)
		self.player_info = self.screen_info(self.player, self.monster)
		self.button = self.screen_action(self.player, self.monster)
		self.monster_info = self.screen_info(self.monster, self.player)


	def update_fight(self, char, enemy):
		#method called when there is action
		self.forget_all()
		self.new_screen()
		
		if enemy.DEAD:
			if not isinstance(enemy, character.Monster):
				character.Parse.NB_MONSTER = 0
			self.dead_screen(enemy)

		if not isinstance(char, character.Monster) and not enemy.DEAD:
			#If attacker not monster and monster not dead => get action from monster
			self.event.get_monster_action(char, enemy)


	def next_monster(self):
		#Get a new monster
		self.forget_all()
		self.monster = character.Parse.get_monster(self.player)
		self.new_screen()


	def restart(self):
		#Go to select menu
		self.destroy()
		Select(self.screen)


		


		