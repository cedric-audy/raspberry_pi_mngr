#!/bin/bash   
#variable now pour que le fichier backup porte le nom de la journée et l'heure du dit backup
################################
# Auteurs : Cedric Audy et Julien Simard   	#
# Session : H2019                                 		# 
################################

FILE="backup_$(date +%b)_$(date +%d)_$(date +%Y)_$(date +%H)_$(date +%M)_$(date +%S)"
tar -czf $FILE.tar.gz /var/www/mngr/html/ ; mv $FILE.tar.gz /var/www/mngr/Scripts/backup/ 
echo "voici le backup $FILE" | mutt -s "CVManager : $FILE" -a "/var/www/mngr/Scripts/backup/$FILE.tar.gz" -- cedric.audy08@gmail.com

