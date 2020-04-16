import serial
import os
import time

port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=1.0)

while True:
	data = raw_input('Wat wil je sturen?')
	port.write(data)
	print('gestuurd')
