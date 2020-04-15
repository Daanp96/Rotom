import serial
import os
import time
import mysql.connector
import pygame

mydb = mysql.connector.connect(
	buffered=True,
	host="localhost",
	user="rotom",
	passwd="Login_96",
	database="login")
mycursor = mydb.cursor()
port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=1.0)
pygame.mixer.init()
pygame.mixer.music.load('/var/www/Rotom/public/ringtones/Default_Bell.mp3')
pygame.mixer.music.set_volume(1.0)

while True:
	acces = False
	deurbel = 'default Beltoon'
	id = port.readline().strip()
	print(id)
	if (id != ''):
		mycursor.execute("SELECT * FROM contact WHERE id=%s;",(id,))
		print(mycursor)
		for x in mycursor:
			print(x[1])
			if(x[5] == 'custom'):
				acces = True
			deurbel=x[4]

		if(acces == True):
			port.write('o')
		if(acces == False):
			mycursor.execute("SELECT * FROM ringtone WHERE title=%s",(deurbel,))
			for y in mycursor:
				path = '/var/www/Rotom/public/' + y[1] 
			pygame.mixer.music.load(path)
			pygame.mixer.music.play()
		acces = False
		mydb.commit()

