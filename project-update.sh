#!/bin/bash

docker-compose up -d
docker exec -it jam_php bash -c "composer install"
docker exec -it jam_php bash -c "./yii migrate --interactive=0"