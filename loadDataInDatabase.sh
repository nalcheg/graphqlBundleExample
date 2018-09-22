#!/usr/bin/env bash

bin/console doctrine:database:drop --force
bin/console doctrine:database:create
bin/console doctrine:migrations:migrate --no-interaction
bin/console doctrine:fixtures:load --no-interaction
