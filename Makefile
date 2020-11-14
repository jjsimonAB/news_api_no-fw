start:
	@echo "*** STARTING.... 🤖🤖👾👾 ******"
	@echo "---------------------------------"
	@echo "---- step 1/3: installing composer dependencies 🤖🤖🤖🤖🤖🤖"
	cd app && composer install
	@echo "---- step 2/3: starting docker containers 🐳🐳🐳🐳🐳🐳🐳🐳🐳🐳"
	docker-compose up -d --build
	@echo "---- step 3/3: running migrations 🎅🏽🎅🏽🎅🏽🎅🏽🎅🏽🎅🏽🎅🏽"
	docker exec -it news_no_fm_php_1 bash -c 'cd /app; vendor/bin/phinx migrate -e development'
	@echo "***** FINISHED. ******"

build:
	@echo "***** STARTING BUILD.... ******"
	cd app && composer install
	docker-compose

test:
	@echo "*** STARTING TESTS.... 🤖🤖👾👾 ******"
	cd app && php vendor/bin/codecept run --steps