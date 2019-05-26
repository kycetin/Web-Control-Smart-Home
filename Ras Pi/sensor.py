# Simple example of reading the MCP3008 analog input channels and printing
# them all out.
# Author: Tony DiCola
# License: Public Domain
import time
import os
import threading
import urllib2
# Import SPI library (for hardware SPI) and MCP3008 library.
import Adafruit_GPIO.SPI as SPI
import Adafruit_MCP3008
import RPi.GPIO as GPIO

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
GPIO.cleanup()
GPIO.setup(25,GPIO.IN)

global door
# Software SPI configuration:
#CLK  = 18
#MISO = 23
#MOSI = 24
#CS   = 25
#mcp = Adafruit_MCP3008.MCP3008(clk=CLK, cs=CS, miso=MISO, mosi=MOSI)

# Hardware SPI configuration:
SPI_PORT   = 0
SPI_DEVICE = 0
mcp = Adafruit_MCP3008.MCP3008(spi=SPI.SpiDev(SPI_PORT, SPI_DEVICE))

def sendDataToServer():
    global temp
    global rain
    global light
    global door
    global doorValue
    print("sending...")
    threading.Timer(6,sendDataToServer).start()
    readAdc()
    readRain()
    
    print("sicaklik degeri",temp)
    print("yagmur",rain)
    print("isik sisdeti",light)
    print("kapir durumu",door)
    print("kapi degeri",doorValue)
    light = "%1.f"%light
    temp = "%1.3f"%temp
    rain = "%1.f"%rain
    door = "%1.f"%door
    urllib2.urlopen("http://webtek.cetinkaya.co/add_data.php?temp="+temp+"&light="+light+"&rain="+rain+"&door="+door).read()

#while True:
def readAdc():
    global values
    global temp
    global light
    global door
    global doorValue
    values = [0]*8
    for i in range(8):
        values[i] =mcp.read_adc(i)
    
    temp = (values[1]*70)/1000
    doorValue = values[2]
    
    light = values[0]
    # Print the ADC values.
    
    
    
    
    # Pause for half a second.
    time.sleep(0.5)

def readRain():
    global rain
    global door
    global doorValue
    state = GPIO.input(25)
    if (state == 0):
        rain = 1
    if (state == 1):
        rain = 0
    if (doorValue < 199):
        door = 0
    if (doorValue > 200):
        door = 1

sendDataToServer()


