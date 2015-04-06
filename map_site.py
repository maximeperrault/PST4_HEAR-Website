#!/usr/bin/python

import pandas as pd
from StringIO import StringIO
import sys
import time
from PIL import Image
import webbrowser
from decimal import Decimal
import json
import sys


import pymongo
from pymongo import MongoClient
from bson.json_util import dumps

#Establish a connection with mongo instance.
connection = MongoClient("ds033069.mongolab.com", 33069)
db = connection["db_hear"]

# MongoLab has user authentication
db.authenticate("projectsysteam19", "Bigdata19")

# recuperation de la collection data
collection = db.data

# recuperation de la collection dans une liste
liste = list(collection.find())

# parse json de la liste
liste_parse = dumps(liste)

# load de la liste json en ocbjet python
data = json.loads(liste_parse, parse_float = Decimal)

df = pd.DataFrame(data)

#df = pd.read_csv("datas1.csv")

mapa = """<script type="text/javascript"> var map = new google.maps.Map(document.getElementById('map'), {zoom: 10,center: new google.maps.LatLng(48.855, 2.346),mapTypeId:google.maps.MapTypeId.ROADMAP});var infowindow = new google.maps.InfoWindow();var marker, i;"""

for n in range(len(df.latitude)):
  if (int(df.sound[n]) < 50):
    image = "./images/green.png"
  elif (int(df.sound[n]) >= 50 and int(df.sound[n]) < 70):
    image = "./images/yellow.png"
  else:
    image = "./images/red.png"

  mapa +="""marker = new google.maps.Marker({ position: new google.maps.LatLng(%s, %s),map: map, icon: "%s"});""" % (df.latitude[n], df.longitude[n], image)  mapa +="""google.maps.event.addListener(marker, 'click', function() { infowindow.setContent('%s dB<br>%s<br>%s');infowindow.open(map,this);});"""% (int(df.sound[n]), df.date[n],df.time[n])

mapa += """</script>""" 

print mapa
