install:
	composer install

PORT ?= 8000
start:
	PHP_CLI_SERVER_WORKERS=5 php -S 0.0.0.0:$(PORT) -t public

autoload:
	composer dump-autoload

brain-games:
	./bin/brain-games

validate:
	composer validate

lint:
	composer run-script phpcs -- --standard=PSR12 src bin

phpcbf:
	vendor/bin/phpcbf -- src bin

test:
	vendor/bin/phpunit
