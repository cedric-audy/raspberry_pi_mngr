#!/bin/bash   
############################################
# Auteurs : Julien bSimard et cedric audy  #
# Session : hiver 2019                     #
############################################
read url
content=$(wget $url -q -O -)
echo $content

# tiré de https://stackoverflow.com/questions/3742983/how-to-get-the-contents-of-a-webpage-in-a-shell-variable
