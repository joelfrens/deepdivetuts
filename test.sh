#!/bin/bash
# My first script

echo "Hello World!"
git status

git add .
git commit -m "More commits"
git push origin vue_layer
echo "Done!"

echo "Backing up!!!!";

mysqldump -uroot -p deepdivetuts > backup.sql


