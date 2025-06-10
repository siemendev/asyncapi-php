.PHONY: test
test: test-functional phpstan cs

.PHONY: test-functional
test-functional:
	@echo "Running functional tests..."
	@docker stop asyncapi-rabbitmq || true
	@docker run -d --rm -p "18423:5672" --name asyncapi-rabbitmq rabbitmq:4-alpine
	@echo "Waiting for RabbitMQ to be ready..."
	@echo "Initial wait for container startup..."
	@sleep 5
	@for i in {1..30}; do \
		if nc -z localhost 18423 2>/dev/null; then \
			echo "RabbitMQ port is open, waiting a bit more for full initialization..."; \
			sleep 2; \
			echo "RabbitMQ is ready!"; \
			break; \
		fi; \
		echo "Waiting for RabbitMQ to start... ($$i/30)"; \
		sleep 1; \
	done
	@ASYNCAPI_RABBITMQ_PORT=18423 php vendor/bin/phpunit --configuration phpunit.xml --colors=always
	@docker stop asyncapi-rabbitmq || true

.PHONY: phpstan
phpstan:
	@echo "Running PHPStan..."
	@php vendor/bin/phpstan.phar analyse

.PHONY: cs
cs:
	@echo "Running PHP CS Fixer..."
	@PHP_CS_FIXER_IGNORE_ENV=1 php vendor/bin/php-cs-fixer fix --config=../../.php-cs-fixer.php --no-interaction --ansi
