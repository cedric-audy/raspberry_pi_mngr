#!/bin/bash   
# Afficher les usagers qui sont UID 500 et plus

############################################ 
# Auteurs : Julien bSimard et cedric audy  #
# Session : hiver 2019 			   #
############################################

incrementation=1
UIDfirstuser=`cat /etc/passwd | cut -d ':' -f 3 | tail -$incrementation | head -1`
firstuser=`cat /etc/passwd | cut -d ':' -f 1 | tail -$incrementation | head -1`
if test $UIDfirstuser -le 1001
then
	echo "Aucun utilisateur listable"
else 
	while test $UIDfirstuser -gt 1001  
	do
		valide=`cat /etc/shadow | grep $firstuser | cut -d ':' -f 2 | grep "^!"`
		echo "-$firstuser" 
		echo "( `du -sh /var/www/html/$firstuser | grep -o ".*K"` )"
		if test -n "$valide"
		then 
			echo "verrouillé"
		fi
		echo "<br/>"
		incrementation=$((incrementation+1))
		UIDfirstuser=`cat /etc/passwd | cut -d ':' -f 3 | tail -$incrementation | head -1`
		firstuser=`cat /etc/passwd | cut -d ':' -f 1 | tail -$incrementation | head -1`
	done
fi
