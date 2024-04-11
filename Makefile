build:
	docker-compose build
up:
	docker-compose up

upd:
	docker-compose up -d

down:
	docker-compose down

status:
	docker-compose ps

console:
	docker exec -it laravel-docker /bin/bash

