setup:
	composer install

test:
	composer run-script phpunit tests

test2:
	composer run-script test

lint:
	composer run-script phpcs -- --standard=PSR12 src tests

lint-fix:
	composer run-script phpcbf -- --standard=PSR12 src tests

install:
	composer install

cu:
	composer update

cd:
	composer dump-autoload

in:
	php public/index.php