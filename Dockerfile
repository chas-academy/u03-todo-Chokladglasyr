FROM php:8.2-apache
RUN docker-php-ext-install pdo pdo_mysql

COPY ./src /var/www/html/src

# # Install PHP code sniffer
# RUN curl -OL https://phars.phpcodesniffer.com/phpcs.phar && curl -OL https://phars.phpcodesniffer.com/phpcbf.phar && \
#     chmod +x phpcs.phar && \
#     mv phpcs.phar /usr/local/bin/phpcs

# # set the coding standard to psr-12


# RUN git clone https://github.com/squizlabs/PHP_CodeSniffer.git /phpcs

# RUN ln -s /phpcs/bin/phpcs /usr/local/bin/phpcs
# RUN ln -s /phpcs/bin/phpcbf /usr/local/bin/phpcbf
# RUN phpcs --config-set default_standard PSR12

# CMD [ "phpcs", "-h" ]
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer global require squizlabs/php_codesniffer --no-progress --no-
RUN composer global require phpunit/phpunit --no-progress --no-suggest

ENV PATH="/root/.composer/vendor/bin:${PATH}"


