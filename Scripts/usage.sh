#!/bin/bash 
###########################################
# Auteurs : Julien bSimard et cedric audy #
# Session : hiver 2019                    #    
###########################################

SpaceUsage=`du -sh /var/www/html/ | grep -o ".*K"`
TotalSpaceUsage=`df -h --total | grep "total" | awk '{print" " $4}'`
TotalRam=`free -k | grep "Mem:" | cut -b 13-19`
FreeRam=`free -k | grep "Mem:" | cut -b 37-43`
echo -e "Le disque dur utilisé par les répertoires usagers est : $SpaceUsage<br/>"
echo -e "Le disque dur utilisé est de $TotalSpaceUsage<br/>"
echo -e "La mémoire vive totale est de : $TotalRam kB (libre : $FreeRam kB)<br/>"
