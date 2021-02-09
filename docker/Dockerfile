FROM php:7.4-alpine

#install php extensions using external open source script
#from https://github.com/mlocati/docker-php-extension-installer
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions gd xdebug intl pdo_pgsql xsl amqp redis

#add php group and user
RUN set -x \
	&& addgroup -g 1000 -S php \
	&& adduser -u 1000 -D -S -G php php

#create app directory and the php user ownership
RUN set -x \
	&& mkdir -p /app \
	&& chown -R php:php /app

#install composer from latest composer official image
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

RUN apk update && apk add bash
RUN apk update && apk add git
#install symfony command and install it globaly in container
RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

WORKDIR /app
COPY ./app /app

CMD symfony server:start