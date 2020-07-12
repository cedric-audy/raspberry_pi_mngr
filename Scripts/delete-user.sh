#!/bin/bash   
# la suppression est seulement possible si l'usager a un UID >= 1000
# Le script retire également le répertoire "home" de l'usager

###########################################
# Auteurs : Julien bSimard et cedric audy #
# Session : hiver 2019                    #
###########################################

UIDuser=`cat /etc/passwd | grep "^$1:" | cut -d ':' -f 3`
if test $UIDuser -le 1002
then
	echo "désolé, cet usager ne peut être supprimé"
elif test $UIDuser -ge 1002
then
	userdel -rf $1
else
	echo "entrez un usager valide"
fi
