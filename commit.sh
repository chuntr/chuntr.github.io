#!/bin/bash

php index.php > index.html
git add .
git ci -m "${1}"
git push origin master
