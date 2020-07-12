#!/bin/bash   
# Doit retourner 1 si les informations sont valides, 0 sinon
# Le mot de passe est hashé avec sha1, afin d'éviter de le laisser en "clear text" dans ce fichier.
# $1 = nom d'usager entré au clavier
# $2 = mot de passe hashé avec sha1 (le mot de passe actuel est "tochange")

# Note : Pour avoir la valeur d'un mot (ex:blablabla) en sha1, écrire dans le terminal : php -r "echo sha1('blablabla');";echo ""

if test "cvmadmin" = $1 -a "534818a040e8131d6df104e0077ee04b03999be0" = $2
then
	echo "1"
else
	echo "-1"
	sleep 15
fi

#POUR CONTRER LES BRUTE FORCE ATTACKS: le plus simple est efficace aura été
#dexecuter une commande sleep de 15s lorsqun mot de passe entré est erroné
#dans le but de ralentir substantiellement une brute force attack
