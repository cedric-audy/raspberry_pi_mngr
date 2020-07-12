#!/bin/bash   
# Création d'un usager, de son mot de passe, et l'empêche de se connecter en SSH

###########################################
# Auteurs : Julien bSimard et cedric audy #
# Session : hiver 2019                    #
###########################################

if test -z "$2"
then
	echo "Le compte doit avoir un mot de passe"
else
cd /var/www/mngr/
useradd -G cvmgroup -m -d /var/www/html/$1 -s /bin/bash -p $(openssl passwd -1 $2) $1

usermod -G cvmgroup $1
chown root:root /var/www/html/$1
chmod 755 /var/www/html/$1

cd /var/www/html/$1
mkdir docs public_html
chown $1:cvmgroup *
fi
