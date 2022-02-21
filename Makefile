install:
	composer install

test:
	composer run-script phpunit tests

lint:
	composer run-script phpcs -- --standard=PSR12 src tests

lint-fix:
	composer run-script phpcbf -- --standard=PSR12 src tests

cu:
	composer update

da:
	composer dump-autoload

c:
	php public/comments.php

v:
	php public/video.php

