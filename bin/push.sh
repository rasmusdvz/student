#!/bin/bash

commitMessage="$1"
if [ "$commitMessage" == "" ]; then
   commitMessage="kein Kommentar"
fi

cd ~/workspace/
git add .
git commit -m "$commitMessage"
git push origin master