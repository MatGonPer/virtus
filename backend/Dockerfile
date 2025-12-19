FROM php:8.4-apache

ARG uid
ARG user

RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    curl \
    zip \
    unzip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_pgsql pgsql

RUN a2enmod rewrite

RUN sed -i 's/80/8080/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

RUN chown -R $user:$user /var/www/html /run/apache2 /var/log/apache2 /var/lock/apache2 /var/lib/apache2

COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

COPY --chown=$user:$user . .

EXPOSE 8080

USER $user

ENTRYPOINT ["entrypoint.sh"]
CMD ["apache2-foreground"]
