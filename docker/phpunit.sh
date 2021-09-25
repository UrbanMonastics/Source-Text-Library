#!/bin/bash

# run the PHPUnit tests
docker exec -it sourcetextlibrary_nginx_php ./vendor/bin/phpunit --testdox test