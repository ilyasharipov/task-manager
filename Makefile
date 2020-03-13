install:
	composer install

lint:
	composer run-script phpcs -- --standard=PSR12 routes tests app

test:
	composer run-script phpunit tests

run:
	php artisan serv