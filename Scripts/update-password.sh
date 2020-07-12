#!/bin/bash

############################################
# Auteurs : Julien bSimard et cedric audy  #
# Session : hiver 2019                     #
############################################

user=`cat /etc/passwd | grep "^$1:" | cut -d ':' -f 1`

if test -n "$user"
then
        echo -e "$2\n$2" | passwd $1
else
        echo "$1 n'existe pas ou le mot de passe est invalide"
fi

