.PHONY: test
test: phpstan cs

.PHONY: phpstan
phpstan:
	@echo "Running PHPStan in all sub-projects..."
	@cd core && make phpstan
	@cd spec && make phpstan
	@cd generator && make phpstan
	@cd adapters/amqp && make phpstan
	@cd serializers/symfony-serializer && make phpstan

.PHONY: cs
cs:
	@echo "Running PHP CS Fixer in all sub-projects..."
	@cd core && make cs
	@cd spec && make cs
	@cd generator && make cs
	@cd adapters/amqp && make cs
	@cd serializers/symfony-serializer && make cs