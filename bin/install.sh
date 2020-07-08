#!/bin/bash
echo "----- run docker-compose -----"
cd `dirname $0`/..
composer install
docker-compose build
docker-compose up -d
yarn install
yarn encore dev
echo Go to http://0.0.0.0:8060/