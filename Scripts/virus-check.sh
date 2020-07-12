#!/bin/bash   
############################################
# Auteurs : Julien bSimard et cedric audy  #
# Session : hiver 2019                     #
############################################

grep ".*su.*shell_exec.*\|.*shell_exec.*su.*" -r -l  /var/www/html/ > virus_log.txt
input="virus_log.txt"
echo "Fichiers infectés (si vide, serveur intègre) : <br/>"
while IFS= read -r line
do
	echo "<strong>INFECTÉ<strong/>: "
	echo "$line"
	echo "<br/>"
done < "$input"
rm virus_log.txt







