#!/bin/bash
################################
# Auteurs : Cedric Audy et Julien Simard        #
# Session : A2018                                               #
################################


echo "<strong> LOG SSH </strong> <br/>"
last > log_ssh_txt.txt
for ((i=1;i<16;i++));do
        echo "#" $i " : "
         head -$i log_ssh_txt.txt | tail -1
        echo -e "<br/>"
done
rm log_ssh_txt.txt



