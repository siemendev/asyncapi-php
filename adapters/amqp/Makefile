.PHONY: test
test: phpstan cs

.PHONY: phpstan
phpstan:
	@echo "Running PHPStan..."
	@php vendor/bin/phpstan.phar analyse

.PHONY: cs
cs:
	@echo "Running PHP CS Fixer..."
	@PHP_CS_FIXER_IGNORE_ENV=1 php vendor/bin/php-cs-fixer fix --config=../../.php-cs-fixer.php --no-interaction --ansi
