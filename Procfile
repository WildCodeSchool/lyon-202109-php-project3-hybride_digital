release: php bin/console cache:clear && php bin/console cache:warmup && php bin/console dotrine:migrations:migrate --no-interaction
web: heroku-php-apache2 public/