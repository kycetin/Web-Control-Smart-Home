from  time import sleep
import os
from bs4 import BeautifulSoup
import requests
import urllib2
import json
import threading
import RPi.GPIO as GPIO
GPIO.setwarnings(False)



def readPage():
    
    GPIO.setmode(GPIO.BCM)
    GPIO.setup(18,GPIO.OUT)
    GPIO.setup(13,GPIO.OUT)
    GPIO.setup(27,GPIO.OUT)
    GPIO.setup(17,GPIO.OUT)
    door = GPIO.PWM(18,50)
    window = GPIO.PWM(13,50)
    door.start(0)
    window.start(0)
    url = "http://webtek.cetinkaya.co/data.php"
    threading.Timer(6,readPage).start()
    response = urllib2.urlopen(url)
    data = response.read()
    page = json.loads(data)
    GPIO.setwarnings(False)
    
    if(page['window']=="0"):
        window.ChangeDutyCycle(2.5)
        sleep(1)
        GPIO.cleanup()
    if (page['window'] == "1"):
        window.ChangeDutyCycle(7.5)
        sleep(1)
        GPIO.cleanup()
    if (page['door'] == "0"):
        door.ChangeDutyCycle(2.5)
        sleep(1)
        GPIO.cleanup()
    if(page['door'] == "1"):
        door.ChangeDutyCycle(7.5)
        sleep(1)
        GPIO.cleanup()
    if(page['bulb'] == "1"):
        GPIO.output(27,GPIO.HIGH)
    if(page['bulb'] == "0"):
        GPIO.output(27,GPIO.LOW)
    if(page['fan']== "1"):
        GPIO.output(17,GPIO.HIGH)
    if(page['fan']== "0"):
        GPIO.output(17,GPIO.LOW)
readPage()



