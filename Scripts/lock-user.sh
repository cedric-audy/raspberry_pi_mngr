#!/bin/bash

############################################
# Auteurs : Julien bSimard et cedric audy  #
# Session : hiver 2019                     #
############################################

user=`cat /etc/passwd | grep "^$1:" | cut -d ':' -f 1`

if test -n "$user"
then 
	usermod -L $user
	echo "$user est verouillé"
else
	echo "$user n'existe pas"
fi
