FROM php:7.4-fpm

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN apt-get update \
    && apt-get install -y --no-install-recommends procps libpq-dev zlib1g-dev libpng-dev libxml2-dev libgmp-dev re2c libzip-dev libssl-dev wget git librabbitmq-dev libssh-dev libyaml-dev libz-dev libicu-dev g++ iputils-ping\
    && chmod +x /usr/local/bin/install-php-extensions && sync \
    && install-php-extensions pcntl zip bcmath sockets gd intl mongodb redis apcu yaml gmp \
    # cleanup
    && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

