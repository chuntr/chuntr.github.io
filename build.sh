#!/bin/bash


# 1. fetch composer and run
curl -s http://getcomposer.org/installer | php
composer='php composer.phar'
${composer} install
if [[ -d vendor ]]; then
    ${composer} update --prefer-dist -vvv --profile
else
    ${composer} install --prefer-dist -vvv --profile
fi

echo "$( date ) build completed"
# 2. npm install
# 3. grunt release
# 4. create tarball
# 5. upload tar to nexus
# 6. trigger downtream deploy job
