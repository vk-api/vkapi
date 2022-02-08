setup:
	composer install
	make env

test:
	composer run-script phpunit tests

test2:
	composer run-script test

lint:
	composer run-script phpcs -- --standard=PSR12 src tests

lint-fix:
	composer run-script phpcbf -- --standard=PSR12 src tests

env:
	touch .env || true

env-prepare:
	cp -n .env.example .env || true

cu:
	composer update

cd:
	composer dump-autoload

in:
	php public/index.php
