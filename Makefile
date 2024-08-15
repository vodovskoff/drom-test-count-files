test:
	docker exec -it app-test-drom-1 php /var/www/html/vendor/phpunit/phpunit/phpunit

fix-cs:
	docker exec -it app-test-drom-1 vendor/bin/php-cs-fixer fix

create:
	docker compose build
	docker compose up -d
	docker exec -it app-test-drom-1 composer install

start:
	docker compose up -d

run-count:
	docker exec -it app-test-drom-1 php src/main.php
