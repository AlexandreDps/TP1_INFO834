# -*- coding: utf-8 -*-
"""
Created on Wed Jan 18 14:53:08 2023

@author: Alexandre
"""

import redis
import sys
import time


email = sys.argv[1] #On récupère le paramètre venant du php
time = time.time()
r = redis.Redis()

#On ajoute le moment de connexion à la queue de la liste définie par
#l'email de l'utilisateur
r.rpush(email, time)
print("Taille de la liste :" + str(r.llen(email)))

if r.llen(email) > 10 : #Plus de 10 connexions
    first_conn = float(r.lindex(email, 0))
    last_conn = float(r.lindex(email, -1))
    #Supprime le premier élement pour maintenir une liste de taille 10
    r.lpop(email)
    #Délai entre la première et 11eme connexion en minutes
    delai = (last_conn - first_conn) / 60 
    if delai < 10 :
        print("Trop de requêtes en 10mn")
        #Supprime la dernière requête puisqu'elle est bloquée
    else :
        print('Accès autorisé')

else :
    print("Accès autorisé")

