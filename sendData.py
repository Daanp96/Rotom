import serial
import os
import time
import mysql.connector
import pygame

mydb = mysql.connector.connect(
	host="localhost",
	user="rotom",
	passwd="Login_96",
	database="login")

port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=1.0)
pygame.mixer.init()
pygame.mixer.music.load('/var/www/Rotom/public/ringtones/Default_Bell.mp3')
pygame.mixer.music.set_volume(1.0)

while True:
	id = port.readline().strip()
	print(id)
	if(id == '1'):
		port.write('o')
	if(id == '0'):
		pygame.mixer.music.play()

