.PHONY: refactoring
refactoring: vendor ## Refactor the code using rector/rector
	symfony php bin/console cache:warmup --env=dev
	symfony php vendor/bin/rector process --config rector.php
