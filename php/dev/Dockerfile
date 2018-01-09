FROM php:7.1.12-fpm

RUN apt-get update \
    && apt-get -y install nano wget curl git zlib1g-dev zip unzip telnet nodejs npm libicu52 \
        --no-install-recommends

# Install intl
RUN apt-get install -y libicu-dev
RUN docker-php-ext-install intl

# Install opcache
RUN docker-php-ext-install opcache

# Install APCu
RUN pecl install apcu && docker-php-ext-enable apcu

# Install mbstring
RUN docker-php-ext-install mbstring

# Install mcrypt
RUN apt-get install -y libmcrypt-dev \
    && docker-php-ext-install mcrypt

# Install PDO
# RUN docker-php-ext-install pdo
# RUN docker-php-ext-install pdo_mysql
# RUN docker-php-ext-install pdo_oci
# RUN docker-php-ext-install pdo_odbc
RUN apt-get install -y libpq-dev
RUN docker-php-ext-install pdo_pgsql
# RUN apt-get install -y libsqlite3-dev
# RUN docker-php-ext-install pdo_sqlite

# Composer + PHPUnit + Phing
RUN \
    curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    composer config -g github-oauth.github.com aeff6491f52163a011cba0b6b6286f5492e25ab6 && \
    wget -qq -O phpunit.phar https://phar.phpunit.de/phpunit.phar && \
    chmod +x phpunit.phar && \
    mv phpunit.phar /usr/local/bin/phpunit && \
    wget -qq -O phing.phar http://www.phing.info/get/phing-latest.phar  && \
    chmod +x phing.phar && \
    mv phing.phar /usr/local/bin/phing && \
    php -v && \
    phpunit --version && \
    phing -v

# Allow su www-data
RUN \
    mkdir /home/www-data && \
    chsh -s /bin/bash www-data && \
    groupmod -g 1000 www-data && \
    usermod -u 1000 www-data && \
    chown -vR 1000:1000 /home/www-data && \
    usermod -d /home/www-data/ www-data


# Npm + Bower + grunt
RUN \
    npm install -g bower grunt grunt-cli && \
    ln -s /usr/bin/nodejs /usr/bin/node && \
    bower -version && \
    grunt --version
RUN chown -R www-data ~/.npm