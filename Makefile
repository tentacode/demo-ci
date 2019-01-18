install:
	composer install
	yarn install

start:
	bin/console server:start 127.0.0.1:1337

stop:
	bin/console server:stop

build:
	yarn run encore dev

reset:
	bin/console doctrine:database:drop --force --if-exists
	bin/console doctrine:database:create
	bin/console doctrine:migration:migrate --no-interaction
	bin/console fixture:load

test:
	bin/phpcs
	bin/phpstan analyse src
	bin/security-checker security:check
	bin/phpspec run -fpretty
	bin/behat -v