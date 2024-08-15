# docker build -t myphpfpm .

# FROM php:7.4-fpm
FROM php:8.0-fpm

RUN apt-get -y update && apt-get install -y gcc make libc-dev libpq-dev wget zip git
RUN docker-php-ext-install pgsql pdo pdo_pgsql

RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
RUN echo "date.timezone=Europe/Paris" >> /usr/local/etc/php/php.ini

# RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
# php composer-setup.php && php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
# php -r "unlink('composer-setup.php');"

# RUN wget https://get.symfony.com/cli/installer -O - | bash &&  mv /root/.symfony5/bin/symfony /usr/local/bin/symfony
# RUN alias ll='ls -l' && alias l='ls -a' && alias h='history'

WORKDIR /usr/share/nginx/html
EXPOSE 9000
CMD ["php-fpm"]
