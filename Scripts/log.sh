#!/bin/bash
################################
# Auteurs : Cedric Audy et Julien Simard        #
# Session : A2018                                               #
################################

echo "<strong> 15 DERNIERES LIGNES DU LOG D'ERREUR </strong> <br/>"
for ((i=15;i>0;i--));do
	echo "#" $((16-$i))  " : "
	tail -$i /var/log/apache2/error.log | head -1
	echo -e "<br/>"
done
