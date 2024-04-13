FROM wordpress:latest

# ARG COMPOSER_TOKEN
# ARG COMPOSER_USERNAME=alexmeanpug

WORKDIR /tmp
ADD install-composer.sh .
RUN chmod +x ./install-composer.sh
RUN ./install-composer.sh
RUN mv ./composer.phar /usr/local/bin/composer

COPY composer.json ./
# RUN composer config --global --auth http-basic.repo.packagist.com $COMPOSER_USERNAME $COMPOSER_TOKEN

WORKDIR /var/www/html