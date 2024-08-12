# docker build -t myphpfpm .

FROM php:7.4-fpm

RUN apt-get -y update && apt-get install -y gcc make libc-dev libpq-dev
RUN docker-php-ext-install pgsql
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
RUN echo "date.timezone=Europe/Paris" >> /usr/local/etc/php/php.ini

EXPOSE 9000
CMD ["php-fpm"]
