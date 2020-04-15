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
DoNotDisturb = " "
while True:
        #volume & niet storen
        mycursor.execute("SELECT * FROM settings")
	for z in mycursor:
		volume = float(z[1])/100
		pygame.mixer.music.set_volume(volume)
		DoNotDisturb = z[2]
	acces = False
	deurbel = 'default Beltoon'
	id = port.readline().strip()
	print(id)

	if(DoNotDisturb != 'on'):
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

	else:
                if (id != ''):
                        mycursor.execute("SELECT * FROM contact WHERE id=%s;",(id,))
                        print(mycursor)
                        for x in mycursor:
                                print(x[1])
                                if(x[6] == 1):
                                        if (id != ''):
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
                                else:
                                        port.write('r')
	mycursor.execute("SELECT * FROM settings;")
	for w in mycursor:
		if w[3]== 'mute':
			port.write('n')
		elif w[3] == 'away':
			port.write('y')
		elif w[3] == 'default':
			port.write('l')
		elif w[3] == 'johova':
			port.write('j')
		elif w[3] == 'later':
			port.write('k')
		else:
			port.write('l')
	mydb.commit()
