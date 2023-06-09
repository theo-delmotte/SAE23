#!/bin/bash

ID=1

data=$(mosquitto_sub -h mqtt.iut-blagnac.fr -t "Student/by-room/+/data" -C 1)

temp=$(echo "$data" | awk -F',' '{print $1}' | awk -F':' '{print $2}')
room=$(echo "$data" | awk -F',' '{print $12}' | awk -F':' '{print $2}' | tr -d '"}')
co2=$(echo "$data"  | awk -F',' '{print $4}' | awk -F':' '{print $2}')


date=$(date +"%Y-%m-%d")
heure=$(date +"%H:%M:%S")

tot=$(echo "SELECT COUNT(*) FROM capteur WHERE nom = '$room';" | /opt/lampp/bin/mysql -h localhost -u root SAE23 | tail -1)

if [[ $tot -gt 0 ]]; then
    id_capteur_temp=$(echo "SELECT ID_capteur FROM SAE23.capteur WHERE nom = '$room' AND type = 'temperature';" | /opt/lampp/bin/mysql -h localhost -u root | tail -1)
    id_capteur_co2=$(echo "SELECT ID_capteur FROM SAE23.capteur WHERE nom = '$room' AND type = 'co2';" | /opt/lampp/bin/mysql -h localhost -u root | tail -1)

    echo "INSERT INTO SAE23.mesure (ID_mesure, date, heure, ID_capteur, valeur) VALUES ('$ID', '$date', '$heure', '$id_capteur_temp', '$temp');" | /opt/lampp/bin/mysql -h localhost -u root 
    echo "INSERT INTO SAE23.mesure (ID_mesure, date, heure, ID_capteur, valeur) VALUES ('$ID', '$date', '$heure', '$id_capteur_co2', '$co2');" | /opt/lampp/bin/mysql -h localhost -u root

    ((ID++))
fi


