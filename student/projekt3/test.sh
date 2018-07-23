#!/bin/bash

TARGET_FILESYSTEM="$1" #Target filesystem that the file gets saved into
PERCENT="$2" #This script stops when the PERCENT-value is reached
TIME="$3" #Time in seconds until the file gets deleted
NAME="$4" #Name of the file

if [ $PERCENT -gt 99 ]; then	#if the PERCENT value is above 99, the script will not execute
  echo "Prozentzahl zu gross"
  read -p "Druecke eine Taste..."
  exit
fi

percentage() { #returns the percentage of used storage
  local used=`df -h | grep $TARGET_FILESYSTEM | cut -d' ' -f 13 | cut -d'%' -f 1`
  echo "$used"
}

echo `df -h | grep $TARGET_FILESYSTEM`
echo `date +%Y:%m:%d-%H:%M:%S`	#scripts outputs the exact time
touch $NAME	#the file NAME is created
while [ $PERCENT -gt `percentage` ]	#adds information to the file as long as the percentage is not reached
do
  cat ./megabyte.txt >> $NAME
done
echo `df -h | grep $TARGET_FILESYSTEM`
echo `date +%Y:%m:%d-%H:%M:%S`	#scripts outputs the exact time
echo "Warte jetzt $TIME Sekunden"
sleep $TIME #scripts waits for TIME seconds
rm -f $NAME
echo `df -h | grep $TARGET_FILESYSTEM`
echo `date +%Y:%m:%d-%H:%M:%S`	#scripts outputs the exact time
