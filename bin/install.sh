#!/bin/bash
echo "----- run docker-compose -----"
cd `dirname $0`/..
docker-compose build
docker-compose up -d
yarn install
echo Go to http://0.0.0.0:8060/